<?php

use app\src\controllers\ProductsController;

$dao = new ProductsController();
$products = $dao->GetModuleProductsFlowCategory();
$output_products = null;
$output_option = null;

if ($output_products['code'] !== 0) {
    # code...
    foreach ($products['message'] as $product) {
        $output_products .= '
        <div class="products_views_container_picture">
        <img src="' . $product['picture'] . '" alt="" srcset="">
    </div>';
    }
}
// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';


if (isset($_SERVER['QUERY_STRING'])) {
    $output_option = '
    <div class="products_views_container_filter" style="width:200px;">
        <h3>Select: Option
            <ul class="select_filter_list">
                <li class="select_filter_item"><a data-link="order=DESC&sortBy=price" href="" class="select_filter_link">DESC</a></li>
                <li class="select_filter_item"><a data-link="order=ASC&sortBy=price" href="" class="select_filter_link">ASC</a></li>
                <li class="select_filter_item"><a data-link="order=DESC&sortBy=discount" href="" class="select_filter_link">Sale</a></li>
                <li class="select_filter_item"><a data-link="order=DESC&sortBy=review" href="" class="select_filter_link">Review</a></li>
            </ul>
        </h3>
    </div>';
} else {
    $output_option = null;
}
echo '
<section class="section products_views grid">
    ' . $output_option . '
    <div class="products_views_container">
        ' . $output_products . '
    </div>
</section>';
?>


<script>
    const productsViews = (() => {
        const handlerEventRoute = () => {
            const linkRequestNodes = document.querySelectorAll('.select_filter_link');
            console.log(window.location);

            for (linkRequestNode of linkRequestNodes) {
                linkRequestNode.addEventListener('click', (e) => {
                    e.preventDefault();
                    console.log(window.location);
                    if (window.location.search.includes('?')) {
                        let searchQuery = window.location.search
                        +"&" +
                        e.target.dataset.link;

                        if (window.location.search.includes('order')) {
                            searchQuery = window.location.search.substring(0, window.location.search.indexOf('&order=')) +
                                "&" +
                                e.target.dataset.link;
                        }

                        const stringJoin = window.location.pathname ?
                            window.location.origin + window.location.pathname + searchQuery :
                            window.location.origin + searchQuery;

                        return window.location.href = stringJoin;
                    }
                })
            }
        };

        handlerEventRoute();
    })()
</script>