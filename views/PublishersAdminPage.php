<?php

use app\src\models\Publishers;

$daoPublishers = new Publishers();
$dataPublishers = $daoPublishers->getPublishers();
$output_Product = null;

while ($row = $dataPublishers->fetch()) {
    # code...
    $output_Product .= " <tr>
        <td class='publisher_id'>{$row["publisher_id"]}</td>
        <td>{$row["name"]}</td>
        <td><button id='myBtn' data-id='{$row["publisher_id"]}'>Update</button></td>
        <td><a href='/DeletePublisher?publisher_id={$row["publisher_id"]}'>Delete</a></td>
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
        <form action="/UpdatePublisher" method="post">
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