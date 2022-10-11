<?php

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';

use app\core\Application;

$stateAccount = null;
$auth = Application::$auth;
$session = $auth->getCredentials();


$authenticated = $session !== null;;
if ($authenticated) {
    # code...
    $stateAccount = '
    <div class="account_container">
        <div class="dropdown">
        <div class="profile-img">
            <img src="' . $session->user['picture'] . '" />
        </div>
        <div class="dropdown-content">
          <a href="profile">Profile</a>
          <a href="ShoppingCart">Shopping</a>
          <a href="logout">Logout</a>
        </div>
        </div>
    </div>';
} else {
    $stateAccount = '<h2 class="login"><a href="login">Login</a></h2>';
}

echo '
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
        function showResult(str) {
            if (str.length == 0) {
                document.getElementById("livesearch").innerHTML = "";
                document.getElementById("livesearch").style.border = "0px";
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState = 4 && this.status == 200) {
                    console.log(this);
                    document.getElementById("livesearch").innerHTML = this.responseText;
                    document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
                }
            }
            xmlhttp.open("GET", "Search?searchKeyword=" + str, true);
            xmlhttp.send();
        }
    </script>
</head>

<body>
    <div class="container">
        <header class="header flex">
            <div class="header_logo">
                <a href="/">LOGO</a>
            </div>

            <div class="header_search">
                <input type="search" onkeyup="showResult(this.value)" name="search" id="search" placeholder="Search for the book you want and read it now... Sherlock Holmes, Harry Pot...">
                <div id="livesearch">
                    <ul class="live_search_list">

                    </ul>
                </div>
                <div class="header_search_content flex">
                    <i class="ri-search-line header_search_content_icon"></i>
                </div>
            </div>

            <div class="header_setting flex">
                ' . $stateAccount . '
            </div>
        </header>
        <main class="main-container gird">
            {{content}}
        </main>
        <footer class="footer"></footer>
    </div>
</body>


</html>
';

?>

</script>
