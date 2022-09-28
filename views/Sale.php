<?php

/** @var mixed $params getter in the router */
$output_products = null;
$query = null;
$query_sale = null;
while ($row = $params['products']->fetch()) {
  $output_products .= '<div class="col w-100">
  <div class="card h-100">
    <img src=' . $row['picture'] . ' class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">' . $row['title'] . '</h5>
      <p class="card-text">' . $row['subtitle'] . '</p>
    </div>
  </div>
</div>';
}

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';

if (isset($_GET['option'])) {
  $query_sale ='&option=' . $_GET['option'] .'';
}

while ($row = $params['category']->fetch()) {
  $query_category = "Category?keyword=" . $row['genres_ID']; 
  $output_category .= '
  <li class="list-group-item"><a href=' . $query_category . '>' . $row['name'] . '</a></li>
  ';
}

echo '
<div class="container mt-3">
    <div class="row">
       <div class="col-3 mr-5">
       <div class="col mb-3">
       <div class="card" style="width: 18rem;">
             <div class="card-header">
                 <a herl="Sale">Xắp Xếp</a>
             </div>
             <ul class="list-group list-group-flush">
                 <li class="list-group-item"><a href="Sale">Theo phần trăm giảm giá</a></li>
                 <li class="list-group-item"><a href="?option=Increment">Giá Tăng Dần</a></li>
                 <li class="list-group-item"><a href="?option=Decrement">Giá Giảm Dần</a></li>
             </ul>
         </div>
     </div>

     <div class="col">
     <div class="card" style="width: 18rem;">
           <div class="card-header">
               <a herl="Sale">Thể Loại Sách</a>
           </div>
           <ul class="list-group list-group-flush">
            ' . $output_category . '
           </ul>
       </div>
   </div>

       </div>
        <div class="col">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            ' . $output_products . '
      </div>
        </div>
    </div>
</div>';
