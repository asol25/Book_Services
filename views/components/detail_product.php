<?php

use app\core\Application;
use app\src\controllers\ProductsController;
use app\src\controllers\ReviewsController;

$daoProduct = new ProductsController();
$daoReviews = new ReviewsController();
$auth = Application::$auth;
$session = $auth->getCredentials();
$data = $daoProduct->GetModuleDetailProduct();
$reviewsData = $daoReviews->GetModuleReviewController();
$output_product = null;
$output_reviews = null;

$output_user_send_message = $session->user['email'] ? '<div class="card">
<div class="col-2">
    <img src="'.$session->user['picture'].'" width="70" class="rounded-circle mt-2">
</div>
<div class="col-10">
    <div class="comment-box ml-2">
        <div class="comment-area">
            <textarea class="form-control" placeholder="what is your view?" rows="4"></textarea>
        </div>
        <div class="comment-btns mt-2">
                    <div class="pull-left">
                    <button class="btn btn-success btn-sm">Cancel</button>      
                    </div>
                    <div class="pull-right">
                    <button class="btn btn-success send btn-sm">Send <i class="fa fa-long-arrow-right ml-1"></i></button>      
                </div>
            </div>
        </div>
    </div>
</div>
</div>' : null;

if ($reviewsData['code'] !== 0) {
    # code...
    while ($row = $reviewsData['message']->fetch()) {
        # code...
        $output_reviews .= '
       <div class="testimonial-box">
       <!--top------------------------->
       <div class="box-top">
           <!--profile----->
           <div class="profile">
               <!--img---->
               <div class="profile-img">
                   <img src="' . $row['picture'] . '" />
               </div>
               <!--name-and-username-->
               <div class="name-user">
                   <strong>' . $row['nickname'] . '</strong>
                   <span>@jkrowling</span>
               </div>
           </div>
           <!--reviews------>
       </div>
    </div>
       ';
    }
} else {
    $output_reviews = '
    <section id="testimonials">
    <!--heading--->
    <div class="testimonial-heading">
        <span>Comments</span>
        <h1>Clients Says</h1>
    </div>
    <!--testimonials-box-container------>
    <div class="testimonial-box-container">
        <!--BOX-1-------------->
        <div class="testimonial-box">
            <!--top------------------------->
            <div class="box-top">
                <!--profile----->
                <div class="profile">
                    <!--img---->
                    <div class="profile-img">
                        <img src="images/c-1.jpg" />
                    </div>
                    <!--name-and-username-->
                    <div class="name-user">
                        <strong>Touseeq Ijaz</strong>
                        <span>@touseeqijazweb</span>
                    </div>
                </div>
                <!--reviews------>
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
            </div>
        </div>
        <!--BOX-2-------------->
        <div class="testimonial-box">
            <!--top------------------------->
            <div class="box-top">
                <!--profile----->
                <div class="profile">
                    <!--img---->
                    <div class="profile-img">
                        <img src="images/c-2.jpg" />
                    </div>
                    <!--name-and-username-->
                    <div class="name-user">
                        <strong>J.K Rowling</strong>
                        <span>@jkrowling</span>
                    </div>
                </div>
                <!--reviews------>
               
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
            </div>
        </div>
        <!--BOX-3-------------->
        <div class="testimonial-box">
            <!--top------------------------->
            <div class="box-top">
                <!--profile----->
                <div class="profile">
                    <!--img---->
                    <div class="profile-img">
                        <img src="images/c-3.jpg" />
                    </div>
                    <!--name-and-username-->
                    <div class="name-user">
                        <strong>Harry Potter</strong>
                        <span>@DanielRedclief</span>
                    </div>
                </div>
                <!--reviews------>
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
            </div>
        </div>
        <!--BOX-4-------------->
        <div class="testimonial-box">
            <!--top------------------------->
            <div class="box-top">
                <!--profile----->
                <div class="profile">
                    <!--img---->
                    <div class="profile-img">
                        <img src="images/c-4.jpg" />
                    </div>
                    <!--name-and-username-->
                    <div class="name-user">
                        <strong>Oliva</strong>
                        <span>@Olivaadward</span>
                    </div>
                </div>
                <!--reviews------>
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat quis? Provident temporibus architecto asperiores nobis maiores nisi a. Quae doloribus ipsum aliquam tenetur voluptates incidunt blanditiis sed atque cumque.</p>
            </div>
        </div>
    </div>
</section>';
};

if (isset($data['code'])) {
    # code...
    $addCart = "/AddShoppingCart?book_id={$data["message"][0]["book_id"]}&picture={$data["message"][0]["picture"]}&title={$data["message"][0]["title"]}&price={$data["message"][0]["price"]}&discount={$data["message"][0]["discount"]}";
    $output_product = '
    <section class="section detail_product most_views">
    <div class="flex most_views_container">
        <div class="most_views_block flex">
            <div class="most_views_picture">
                <img src="' . $data['message'][0]['picture'] . '" alt="">
            </div>
            <div class="most_views_content">
                <h1 class="most_views_content_title">' . $data['message'][0]['title'] . '</h1>
                <p class="most_views_content_description">' . $data['message'][0]['subtitle'] . '</p>
                <p class="most_views_content_desc">Detective-Love-History</p>
            </div>
        </div>
    </div>

    <div class="detail_product_content">
        <p class="detail_product_content_price">Price: ' . $data['message'][0]['price'] . '</p>
        <div class="detail_product_content_description">
            <p class="description">Description</p>
            <p class="detail_description" id="content">
            ' . $data['message'][0]['description'] . '
            </p>
        </div>

        <button id="myBtn">READ REVIEWS</button>
        <button id="button_moreContent">READ MORE</button>
        <a href= "' . $addCart . '" id="button_moreContent">ADD CART</a>

        <!-- The Modal -->
        <div id="myModal" class="modal">
          <!-- Modal content -->
          <div class="modal-content">
            <span class="close">&times;</span>
            <section id="testimonials">
        <!--heading--->
        <!--testimonials-box-container------>
        <div class="testimonial-box-container">
           ' . $output_reviews . '
        </div>
        '.$output_user_send_message.'
        </div>
</section>';
}

echo "$output_product";
?>


<script>
    const loadMostViews = (() => {
        const most_views_block = document.querySelector('.most_views_block');
        const color = ['#71C5F461', '#AB71F461', '#F471A861'];

        const random = (items) => {
            return items[Math.floor(Math.random() * items.length)];
        }

        const render = () => {
            most_views_block.style.backgroundColor = random(color);
        }

        const readMoreContent = () => {
            let isCheckedLessOrMore = false;
            document.querySelector('#button_moreContent').addEventListener('click', function() {
                document.querySelector('#content').style.height = '3.6em';
                isCheckedLessOrMore = !isCheckedLessOrMore;
                this.innerHTML = "READ LESS";

                if (isCheckedLessOrMore) {
                    this.innerHTML = "READ MORE";
                    document.querySelector('#content').style.height = 'auto';
                }
                console.log({
                    isCheckedLessOrMore
                });
            });
        }
        const dialog_reviews = () => {
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal 
            btn.onclick = function() {
                modal.style.display = "block";
            }

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
        }
        render();
        dialog_reviews();
        readMoreContent();
    })();
</script>