<?php
$dao = new \app\src\controllers\CategoryController();
$data = $dao->GetModuleCategoryController();

$outputOfCategory = null;

if ($data['code'] != 0) {
    while ($value = $data['message']->fetch()) {
        $dateSet = $value['genres_ID'];
        $name = $value['name'];
        $outputOfCategory .= '
        <div class="checkbox" data-id="' . $dateSet . '">
        <input type="checkbox" class="category_input" id="' .   $name . '" name="' .   $name . '" data-id="keyword=' . $dateSet . '">
        <label for="' .   $name . '" data-id="1">' .   $name . '</label>
    </div>
    ';
    }
} else {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    exit();
}

echo '
<section class="section category_views grid">
    <div class="search">
        <i class="ri-search-line search_icon"></i>
        <input type="text" class="search_input" placeholder="Search categories and...">
    </div>
    <div class="category_container">
        <p class="category_container_title"><a href="/">Popular Categories</a></p>
        <form action="" method="get">
           ' . $outputOfCategory . '
        </form>
    </div>
</section>';
?>



<script>
    const categoryViews = ((allProductsCheckedNode) => {
        const checkBoxNodes = document.querySelectorAll('.category_input');

        const handleEventSearch = () => {
            const searchNode = document.querySelector('.search_input');
            const iconNode = document.querySelector('.search_icon');
            searchNode.addEventListener('focus', (e) => {
                console.log(e);
                e.preventDefault();
                iconNode.style.display = 'none';
            });

            searchNode.addEventListener('blur', (e) => {
                console.log(e);
                e.preventDefault();
                iconNode.style.display = 'block';
            });
        }

        /**
         * A method handler Checked field CheckBox.
         * When window onload set checked to non-checked.
         * Alter click handler set to checked.
         */
        handlerEvent = () => {
            window.onload = () => {
                checkBoxNodes.forEach(element => {
                    element.removeAttribute('checked');
                    const findIndexOfString = window.location.search.includes(element.dataset.id);
                    if (findIndexOfString) {
                        element.checked = findIndexOfString;
                    }
                });
            };

            checkBoxNodes.forEach(element => {
                element.addEventListener('click', (e) => {
                    e.preventDefault();

                    if (!window.location.search.includes("keyword")) {
                        const params = "?keyword=" + e.target.dataset.id;
                        window.location.href = window.location.origin + params;
                    }

                    if (window.location.pathname) {
                        const params = window.location.pathname + window.location.search + "&" + e.target.dataset.id;
                        window.location.href = window.location.origin + params;
                    }
                    const params = "?" + e.target.dataset.id;
                    window.location.href = window.location.origin + params;
                })
            });
        };

        handlerEvent();
        handleEventSearch();
    })();
</script>