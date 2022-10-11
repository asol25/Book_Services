<style>
    <?php

    use app\src\models\Authors;
    use app\src\models\Category;
    use app\src\models\Publishers;

    include_once 'views/scss/style.css'; ?>
</style>
<?php
include_once 'views/components/nav_admin.php';

$daoAuthors = new Authors();
$dataAuthors = $daoAuthors->getAuthors();
$output_Product = null;


while ($row = $dataAuthors->fetch()) {
    // print_r($row);
    # code...
    $output_Product .= " <tr>
        <td class='author_id'>{$row["AUTHOR_ID"]}</td>
        <td>{$row["name"]}</td>
        <td><button id='myBtn' data-id='{$row["AUTHOR_ID"]}'>Update</button></td>
        <td><a href='/DeleteAuthor?author_id={$row["AUTHOR_ID"]}'>Delete</a></td>
    </tr>";
}
$template = "<table>
<tr>
    <th>id</th>
    <th>name</th>
    <th>update</th>
    <th>delete</th>
</tr>
$output_Product
</table>";
?>

<section class="section admin_views">
    <div class="admin_container">
        <div class="admin_container_manager">
            <?php echo "$template" ?>
        </div>
    </div>
</section>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="/UpdateAuthor" method="post">
            <table>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                </tr>
                <tr>
                    <td><input name="id" type="text" class="set_post_publisher_id"></td>
                    <td><input name="name" type="text"></td>
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