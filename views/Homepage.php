<?php

/** @var mixed $params getter in the router */
$output_products = null;
$topSale = null;
$topReviews = null;

while ($row = $params['topSale']->fetch()) {
    $topSale .= '<li class="list-group-item">' . $row["title"] . '  (' . $row['discount'] . '%)</li>';
}

while ($row = $params['topReviews']->fetch()) {
    $topReviews .= '<li class="list-group-item">' . $row["title"] . ' (' . $row['count'] . ')</li>';
}


for ($i = 0; $i < sizeof($params['products']); $i++) {
    $output_products .= '
      <div class="card">
            <img class="card-img-top" src=' . $params['products'][$i]->{'image'} . ' width="100px" height="200px" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">' . $params['products'][$i]->{'title'} . '</h5>
                <p class="card-text">' . $params['products'][$i]->{'subtitle'} . '</p>
            </div>
        </div>
    ';
}

// echo '
// <body>
// <div class="container mt-3">
// <div class="row">
//     <div class="col-3 mr-3">
//         <div class="card mb-3" style="width: 18rem;">
//          <div class="card-header">
//          <a href="Sale">Giảm Giá Sập Sàn</a>
//          </div>
//            <ul class="list-group list-group-flush">
//            ' . $topSale . '
//             </ul>
//         </div>

//         <div class="card" style="width: 18rem;">
//             <div class="card-header">
//                 <a href="Views">Xem nhiều nhất</a>
//             </div>
//             <ul class="list-group list-group-flush">
//               ' . $topReviews . '
//             </ul>
//         </div>
//     </div>

//     <div class="col">
//     <div class="card-columns">
//        ' . $output_products . '
//     </div>
//     </div>
// </div>
// </div>
    
// </body>';

?>

<div class="container">
    <div class="banner"></div>
</div>
