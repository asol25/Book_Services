<?php

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
echo '<!DOCTYPE html>
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
        <header class="header"></header>
        <main class="main-container">
        {{content}}
        </main>
        <footer class="footer"></footer>
    </div>
</body>
</html>';
?>
