<!DOCTYPE>
<html lang="en">

<head>
    <title>Media</title>
    <link href="../assets/css/base.css" type="text/css" rel="stylesheet"/>
    <link rel="shortcut icon" href="../assets/img/favicon.ico">
    <script src="../assets/js/gtag.js"></script>
    <script src="../assets/js/base.js"></script>
    <?php
    include("../assets/html/head.html");
    ?>
</head>

<body>

<nav>
    <ul>
        <li style="margin-right: 10px">
            <a href="../"><img alt="atlas logo" style="width: 50px; height: 50px; margin-top: -15px;"
                                        src="../assets/img/brand/logo_circle_192px.png"/></a>
        </li>
        <li><a href="../">Home</a></li>
        <li><a class="active" href="#">Media</a></li>
        <li><a href="../news">News</a></li>
        <li><a href="../releases">Releases</a></li>
        <li><a href="../twitter">Twitter</a></li>
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
