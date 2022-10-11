<?php
// echo "<pre>";
// print_r($_SESSION['ShoppingCart']);
// echo "</pre>";

$output_products = null;



foreach ($_SESSION['ShoppingCart'] as $key => $value) {
    $output_products .= '
        <div class="most_views_block flex" style="background-color: rgba(244, 113, 168, 0.38);">
            <div class="most_views_picture">
                <img src="' . $value['key_picture'] . '" alt="">
            </div>
            <div class="most_views_content">
                <h1 class="most_views_content_title">' . $value['key_name'] . '</h1>
                // <p class="most_views_content_description">' . $value['key_name'] . '</p>
                <p class="most_views_content_desc">Detective-Love-History</p>
                <div class="most_views_content_button"><a href="/Checkout?book_isb=' . $value['key_id'] . '">CheckOut</a></div>
            </div>
        </div>';
}
?>
<section class="shopping_container">
    <div class="shopping_products flex">
        <?php
        echo $output_products;
        if (isset($_GET['state']) && $_GET['state'] == "true") {
            # code...
            echo '
        <dialog id="dialog" open>
        <img src="https://cdn2.vectorstock.com/i/thumb-large/02/26/vegan-minimalistic-green-circle-sticker-design-vector-29140226.jpg">
        <p>You have payment subsection</p>
        </dialog>
        ';
        }
        ?>
    </div>
    <div class="main_products_container">
        <?php
        require_once 'views/components/category_views.php';

        require_once 'views/components/products_views.php';
        ?>
    </div>
</section>

<script>
    const dialog = document.getElementById('dialog');
    dialog.addEventListener('click', function(event) {
        window.location.href = window.location.protocol + "//" + window.location.host + "/" +"ShoppingCart";
    })
</script>