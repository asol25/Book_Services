<?php

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="views/scss/style.css">
    <link rel="stylesheet" href="views/scss/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="header flex">
            <div class="header_logo">
                LOGO
            </div>

            <div class="header_search">
                <input type="search" name="search" id="search" placeholder="Search for the book you want and read it now... Sherlock Holmes, Harry Pot...">
                <div class="header_search_content flex">
                    <i class="ri-search-line header_search_content_icon"></i>
                </div>
            </div>

            <div class="header_setting flex">
                <img src="views/pictures/bx_bx-book-heart.svg" alt="">
                <img src="views/pictures/fluent_premium-person-20-regular.svg" alt="">
                <img src="views/pictures/ic_round-notifications-none.svg" alt="">
                <img src="views/pictures/IMG20210528181544.svg" alt="">
            </div>
        </header>

        <nav class="nav">
            <ul class="nav_list flex">
                <li class="nav_item"><a href="" class="nav_link">Detective</a></li>
                <li class="nav_item"><a href="" class="nav_link">Love</a></li>
                <li class="nav_item"><a href="" class="nav_link">Novel</a></li>
                <li class="nav_item"><a href="" class="nav_link">History</a></li>
                <li class="nav_item"><a href="" class="nav_link">Science fiction</a></li>
                <li class="nav_item"><a href="" class="nav_link">Fantastic</a></li>
                <li class="nav_item"><a href="" class="nav_link">More</a></li>
            </ul>
        </nav>
        <main class="main-container gird">
            {{content}}
        </main>
        <footer class="footer"></footer>
    </div>
</body>

</html>