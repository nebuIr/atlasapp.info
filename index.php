<!DOCTYPE>
<html lang="en">

<head>
    <title>Welcome</title>
    <link href="assets/css/base.css" type="text/css" rel="stylesheet"/>
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-68526906-4"></script>
    <script src="assets/js/gtag.js"></script>
    <script src="assets/js/base.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
</head>

<body>

<nav>
    <ul>
        <li style="margin-right: 10px"><a href="/"><img alt="atlas logo"
                                                                 style="width: 50px; height: 50px; margin-top: -15px;"
                                                                 src="/assets/img/brand/logo_circle_192px.png"/></a>
        </li>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="/media">Media</a></li>
        <li><a href="/news">News</a></li>
        <li><a href="/releases">Releases</a></li>
        <li><a href="/twitter">Twitter</a></li>
        <?php
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if (stripos($agent, 'android') !== false) {
            echo "<li><a target=\"_blank\" href=\"/home\">Open App</a></li>";
        } ?>
    </ul>
</nav>

<main class="main-text-medium">
    <div class="home-logo" style="background-image:url(assets/img/brand/logo_square_512px.png)"></div>
    <h1 class="title-light nms no-highlight center">Atlas for No Man's Sky</h1>
    <p class="text-light center" style="margin-bottom: 50px;">Atlas for No Man's Sky is a guide app for No Man's
        Sky on your Android Device.<br/>
        It provides fast access to all items including basic information, recipes and values.</p>
    <!--<a href='https://play.google.com/store/apps/details?id=me.nebulr.atlas&utm_source=wh&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img style="margin-left: auto; margin-right: auto; display: block" height="100px" alt='Get it on Google Play' src='https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png'/></a>-->
    <div class="button-wrapper">
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSc3qRh8b1G83AexOIpyCNXetd7QCFUeijKmO8qSzxVP4hObYQ/viewform"
           class="button">Register for Alpha</a>
    </div>
    <img alt="app screenshots" class="dash-show" src="assets/img/screens/dash_small_compressed.png" width="80%">
    <div class="grid frontpage">
        <div class="card card-mobile">
            <img alt="screenshot" class="card-img-full" src="/assets/img/screens/dash_1_small.png"/>
        </div>
        <div class="text-card">
            <p class="nms no-highlight"
               style="font-weight: bold; font-size: calc(100% + 1.5vw); color: #000; margin-bottom: 0;">
                Achievements</p>
            <p class="text-light">Keep track of all your achievements.<br>All platforms are supported.</p>
        </div>
        <div class="card card-mobile">
            <img alt="screenshot" class="card-img-full" src="/assets/img/screens/dash_2_small.png"/>
        </div>
        <div class="text-card">
            <p class="nms no-highlight"
               style="font-weight: bold; font-size: calc(100% + 1.5vw); color: #000; margin-bottom: 0;">Dashboard</p>
            <p class="text-light">Stay up to date with all the latest news<br>about No Man's Sky.</p>
        </div>
        <div class="card card-mobile">
            <img alt="screenshot" class="card-img-full" src="/assets/img/screens/dash_3_small.png"/>
        </div>
        <div class="text-card">
            <p class="nms no-highlight"
               style="font-weight: bold; font-size: calc(100% + 1.5vw); color: #000; margin-bottom: 0;">Items</p>
            <p class="text-light">View all important information.<br>From simple stats to detailed descriptions.</p>
        </div>
    </div>
</main>
<?php
include("assets/html/footer.html");
?>
</body>

</html>
