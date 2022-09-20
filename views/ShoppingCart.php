<?php

/** @var mixed $params getter in the router */
$output_products = null;
foreach ($params as $key => $value) {
    $discount = $params[$key]['discount'] != "" ? $params[$key]['discount'] . "%": "0";
    $output_products .= '<tr class="table_category">
   <td>' . $params[$key]['book_title'] . '</td>
   <td>' . $params[$key]['book_price'] . '</td>
   <td>' .  $discount  . '</td>
   <td><input type="number" name="quantity" value=1></td>
</tr>';
}

echo ' <div class="body">
<div class="shopping_container">
<table>
<tr class="table_shopping">
    <th>Title</th>
    <th>Price</th>
    <th>Discount</th>
    <th>Quantity</th>
</tr>

' . $output_products . '

</table>
</div>
</div>';
