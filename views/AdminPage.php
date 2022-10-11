<div class="admin_container">
    <?php
    include_once 'views/components/nav_admin.php';
    ?>

    <section class="section admin_views">
        <div class="admin_container">
            <div class="admin_container_manager">
                <?php
                // print_r($_GET);
                if ($_GET['select'] == 'Manager' && $_GET['options'] == 'Products') {
                    # code...
                    include_once 'views/ProductsAdminPage.php';
                } else if ($_GET['select'] == 'Manager' && $_GET['options'] == 'Authors') {
                    # code...
                    include_once 'views/AuthorsAdminPage.php';
                } else if ($_GET['select'] == 'Manager' && $_GET['options'] == 'Publishers') {
                    # code...
                    include_once 'views/PublishersAdminPage.php';
                } else if ($_GET['select'] == 'Add' && $_GET['options'] == 'Products') {
                    # code...
                    include_once 'views/AddProductsAdminPage.php';
                } else if ($_GET['select'] == 'Add' && $_GET['options'] == 'Authors') {
                    # code...
                    include_once 'views/AddAuthorsAdminPage.php';
                } else
                    # code...
                    include_once 'views/AddPublisherAdminPage.php';
                ?>
            </div>
        </div>
    </section>
</div>