<style>
    <?php

    use app\src\models\Authors;
    use app\src\models\Category;
    use app\src\models\Publishers;

    include_once 'views/scss/style.css'; ?>
</style>
<?php
include_once 'views/components/nav_admin.php';

$daoProduct = new \app\src\models\Product();
$dataProduct = $daoProduct->getProductsDetail();

$daoAuthors = new Authors();
$dataAuthors = $daoAuthors->getAuthors();

$daoPublishers = new Publishers();
$dataPublishers = $daoPublishers->getPublishers();


$daoCategory = new Category();
$dataCategory = null;
$output_Product = null;

while ($row = $dataProduct->fetch()) {
    # code...
    $dataCategory = $daoCategory->getID($row["book_id"]);
    $output_Category = $dataCategory->fetch();
    $discountNull = $row['discount'] ? $row['discount'] : 0;
    $output_Product .= " <tr>
        <td class='book_id'>{$row["book_id"]}</td>
        <td>{$row["title"]}</td>
        <td>{$row["price"]}</td>
        <td><img src={$row["picture"]}></td>
        <td>{$row["author"]}</td>
        <td>{$row["publisher"]}</td>
        <td>{$discountNull}%</td>
        <td>{$output_Category["name"]}</td>
        <td><button id='myBtn' data-id='{$row["book_id"]}'>Update</button></td>
        <td><a href='/DeleteProduct?book_id={$row["book_id"]}'>Delete</a></td>
    </tr>";
}
$template = "<table>
<tr>
    <th>id</th>
    <th>title</th>
    <th>price</th>
    <th>picture</th>
    <th>author</th>
    <th>publisher</th> 
    <th>discount</th>
    <th>category</th>
    <th>update</th>
    <th>delete</th>
</tr>
$output_Product
</table>";
?>

<section class="section admin_views">
    <div class="admin_container">
        <div class="admin_container_manager">
            <?php
            echo "$template"
            ?>
        </div>
    </div>
</section>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="/UpdateProduct" method="post">
        <table>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>price</th>
                <th>picture</th>
            </tr>
            <tr>
                <td><input name="id" type="text" class="set_post_publisher_id"></td>
                <td><input name="title" type="text"></td>
                <td><input name="price" type="text"></td>
                <td><input name="picture" type="text"></td>
            </tr>
            <tr>
                <th>author</th>
                <th>publisher</th>
                <th>discount</th>
                <th>description</th>
                <th>category</th>
            </tr>
            <tr>
                <td>
                    <select name="authors">
                        <?php
                        while ($row = $dataAuthors->fetch()) {
                            # code...
                            echo "<option value={$row["AUTHOR_ID"]}>{$row["name"]}</option>";
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <select name="publishers">
                        <?php
                        while ($row = $dataPublishers->fetch()) {
                            # code...
                            echo "<option value={$row["publisher_id"]}>{$row["name"]}</option>";
                        }
                        ?>
                    </select>
                </td>
                <td><input name="discount" type="text"></td>
                <td><input name="description" type="text"></td>
                <td>
                    <select name="category">
                        <?php
                        $dataCategory = $daoCategory->getAll();
                        while ($row = $dataCategory->fetch()) {
                            # code...
                            echo "<option value={$row["genres_ID"]}>{$row["name"]}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" value="Update">
        </form>
    </div>

</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");
    // Get the button that opens the modal
    var btn = document.querySelectorAll("#myBtn");
    for (const iterator of btn) {
        iterator.addEventListener("click", function(e) {
            e.preventDefault();
            modal.style.display = "block";
            const setPostBookId = document.querySelector('.set_post_publisher_id').value = e.target.dataset.id;
        })
    }
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    console.log(span);
    // When the user clicks on the button, open the modal
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>