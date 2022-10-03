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
        <input type="checkbox" class="category_input" id="' .   $name . '" name="' .   $name . '" data-id="' . $dateSet . '">
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
        <p class="category_container_title">Popular Categories</p>
        <form action="" method="get">
           ' . $outputOfCategory . '
        </form>
    </div>
</section>';
?>



<script>
    const categoryViews = ((allProductsCheckedNode) => {
        const checkBoxNodes = document.querySelectorAll('.category_input');

        window.onload = () => {
            checkBoxNodes.forEach(element => {
                element.removeAttribute('checked');
                const findIndexOfString = window.location.search.includes(element.dataset.id);
                if (findIndexOfString) {
                    element.checked = findIndexOfString;
                }


            });
        };

        handlerEvent = () => {
            checkBoxNodes.forEach(element => {
                element.addEventListener('click', (e) => {
                    e.preventDefault();
                    const params = "?category=" + e.target.dataset.id;
                    window.location.href = window.location.origin + params;
                })
            });
        };
        
        handlerEvent();
    })();
</script>