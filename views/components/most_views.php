<?php
$dao = new \app\src\controllers\ProductsController();
$data = $dao->GetModuleProductsPopulate();

$outputOfProductPopulated  = null;

if ($data['code'] != 0) {
    while ($value = $data['message']->fetch()) {
        $request = "products_detail?book_isb=" . $value['book_id'];

        $outputOfProductPopulated .= '
        <div class="most_views_block flex">
        <div class="most_views_picture">
            <img src="' . $value['picture'] . '" alt="">
        </div>
        <div class="most_views_content">
            <h1 class="most_views_content_title">' . $value['title'] . '</h1>
            <p class="most_views_content_description">' . $value['subtitle'] . '</p>
            <p class="most_views_content_desc">Detective-Love-History</p>
            <div class="most_views_content_button"><a href="' .   $request . '">Now Read!</a></div>
        </div>
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
<section class="section most_views grid">
    <div class="flex most_views_container">
       ' . $outputOfProductPopulated . '
    </div>
</section>
';

?>
<script>
    const loadMostViews = (() => {
        const most_views_block = document.querySelectorAll('.most_views_block');
        const color = ['#71C5F461', '#AB71F461', '#F471A861'];

        const random = (items) => {
            return items[Math.floor(Math.random() * items.length)];
        }

        const render = () => {
            most_views_block.forEach(element => {
                element.style.backgroundColor = random(color);
            });
        }

        render();
    })();
</script>