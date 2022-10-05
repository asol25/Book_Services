<?php

use app\src\controllers\ProductsController;

$dao = new ProductsController();
$products = $dao->GetModuleProductsFlowCategory();
$output_products = null;
// echo "<pre>";
// print_r($products);
// echo "</pre>";


if ($output_products['code'] !== 0) {
    # code...
    foreach ($products['message'] as $product) {
        $output_products .= '
        <div class="products_views_container_picture">
        <img src="' . $product['picture'] . '" alt="" srcset="">
    </div>';
    }
}
echo '
<section class="section products_views grid">
    <div class="products_views_container">
        ' . $output_products . '
    </div>
</section>';
