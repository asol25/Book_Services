<?php

use app\src\controllers\ProductsController;

$dao = new ProductsController();
$products = $dao->GetModuleProductsFlowCategory();

print_r($products);
?>

<section class="section products_views grid">
    <div class="products_views_container">
        <div class="products_views_container_picture">
            <img src="" alt="" srcset="">
        </div>
    </div>
</section>