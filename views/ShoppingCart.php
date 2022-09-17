<?php

/** @var mixed $params getter in the router */
$output_products = null;

for ($index = 0; $index < $params; $index++) {
   $output_products .= ' <div class="card">
   <img src=' . $params[$index]->{'image'} . ' alt="Denim Jeans" style="width:100%">
   <h1>' . $params[$index]->{'title'} . '</h1>
   <p class="price">' . $params[$index]->{'price'} . '</p>
   <input type="number" />
   </div> ';
}


echo "$output_products";
