<!DOCTYPE>
<html lang="en">

<head>
    <title>Media</title>
    <link href="../assets/css/base.css" type="text/css" rel="stylesheet"/>
    <link rel="shortcut icon" href="../assets/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-68526906-4"></script>
    <script src="../assets/js/gtag.js"></script>
    <script src="../assets/js/base.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
</head>

<body>

<nav>
    <ul>
        <li style="margin-right: 10px">
            <a href="../index.php"><img alt="atlas logo" style="width: 50px; height: 50px; margin-top: -15px;"
                                        src="../assets/img/brand/logo_circle_192px.png"/></a>
        </li>
        <li><a href="../index.php">Home</a></li>
        <li><a class="active" href="#">Media</a></li>
        <li><a href="news.php">News</a></li>
        <li><a href="releases.php">Releases</a></li>
        <li><a href="twitter.php">Twitter</a></li>
        <?php
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if (stripos($agent, 'android') !== false) {
            echo "<li><a target=\"_blank\" href=\"/home\">Open App</a></li>";
        } ?>
    </ul>
</nav>

<main>
    <div class="grid">

        <div class="card card-mobile-screen">
            <img alt="screenshot" class="card-img-full" src="../assets/img/media/dash_1_dark_small.png"/>
        </div>

        <div class="card card-mobile-screen">
            <img alt="screenshot" class="card-img-full" src="../assets/img/media/dash_2_light_small.png"/>
        </div>

        <div class="card card-mobile-screen">
            <img alt="screenshot" class="card-img-full" src="../assets/img/media/dash_3_dark_small.png"/>
        </div>

        <div class="card card-mobile-screen">
            <img alt="screenshot" class="card-img-full" src="../assets/img/media/resources_list_dark_small.png"/>
        </div>

        <div class="card card-mobile-screen">
            <img alt="screenshot" class="card-img-full" src="../assets/img/media/resources_details_dark_small.png"/>
        </div>

        <div class="card card-mobile-screen">
            <img alt="screenshot" class="card-img-full" src="../assets/img/media/products_details_light_small.png"/>
        </div>

        <div class="card card-mobile-screen">
            <img alt="screenshot" class="card-img-full" src="../assets/img/media/achievements_dark_small.png"/>
        </div>

    </div>
</main>
<?php
include ("../assets/html/footer.html");
?>
</body>
</html>
