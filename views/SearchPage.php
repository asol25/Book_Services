<?php

/** @var mixed $params getter in the router */
$output_products = null;

while ($row = $params['products']->fetch()) {
    $discount = $row['discount'] != "" ? $row['discount'] . "%" : "0";
    $output_products .= '<tr class="table_category">
    <td>' . $row['title'] . '</td>
    <td>' . $row['subtitle'] . '</td>
    <td>' . $row['price'] . '</td>
    <td><img class="image_category" src=' . $row['picture'] . '></td>
    <td>' . $row['authors_name'] . '</td>
    <td>' . $row['publisher_name'] . '</td>
    <td>' .  $discount  . '</td>
    <td><a href="AddShoppingCart?book_id='
        . $row['book_id']
        . '&selected=' . "Populate"
        . '">Add Cart</a></td>
</tr>';
}
if (empty($output_products))
    $output_products = "<tr class='error_search table_category'>
    <td colspan='8'>404 Not Found Any Product Selected</td>
    </tr>";

echo ' <div class="body">
<div class="category_container">
<br>
<table>
<tr class="table_category">
    <th>Title</th>
    <th>Description</th>
    <th>Price</th>
    <th>Author</th>
    <th>Publisher</th>
    <th>Category</th>
    <th>Discount</th>
    <th>Buy</th>
</tr>

' . $output_products . '

</table>
</div>
</div>';
