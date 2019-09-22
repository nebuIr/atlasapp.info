<!DOCTYPE>
<html lang="en">

<head>
    <title>Welcome</title>
    <?php
    include("assets/html/head.html");
    ?>
</head>

<body>

<nav>
    <ul>
        <li style="margin-right: 10px"><a href="/"><img alt="atlas logo"
                                                                 style="width: 50px; height: 50px; margin-top: -15px;"
                                                                 src="/assets/img/brand/logo_circle_192px.png"/></a>
        </li>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="/media">Screenshots</a></li>
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
    <h1 class="title-light quicksand no-highlight center">Atlas for No Man's Sky</h1>
    <p class="text-light center quicksand-medium" style="margin-bottom: 50px;">Atlas for No Man's Sky is a guide app for No Man's
        Sky on your Android Device.<br/>
        It provides fast access to all items including basic information, recipes and values.</p>
    <!--<a href='https://play.google.com/store/apps/details?id=me.nebulr.atlas&utm_source=wh&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img style="margin-left: auto; margin-right: auto; display: block" height="100px" alt='Get it on Google Play' src='https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png'/></a>-->
    <img alt="app screenshots" class="dash-show" src="assets/img/screens/dash_small_compressed.png" width="80%">
    <div class="grid frontpage">
        <div class="card card-mobile">
            <img alt="screenshot" class="card-img-full" src="/assets/img/screens/dash_1_small.png"/>
        </div>
        <div class="text-card">
            <p class="quicksand-light no-highlight"
               style="font-weight: bold; font-size: calc(100% + 1.5vw); color: #000; margin-bottom: 0;">
                Achievements</p>
            <p class="text-light quicksand-medium">Keep track of all your achievements.<br>All platforms are supported.</p>
        </div>
        <div class="card card-mobile">
            <img alt="screenshot" class="card-img-full" src="/assets/img/screens/dash_2_small.png"/>
        </div>
        <div class="text-card">
            <p class="quicksand-light no-highlight"
               style="font-weight: bold; font-size: calc(100% + 1.5vw); color: #000; margin-bottom: 0;">Dashboard</p>
            <p class="text-light quicksand-medium">Stay up to date with all the latest news<br>about No Man's Sky.</p>
        </div>
        <div class="card card-mobile">
            <img alt="screenshot" class="card-img-full" src="/assets/img/screens/dash_3_small.png"/>
        </div>
        <div class="text-card">
            <p class="quicksand-light no-highlight"
               style="font-weight: bold; font-size: calc(100% + 1.5vw); color: #000; margin-bottom: 0;">Items</p>
            <p class="text-light quicksand-medium">View all important information.<br>From simple stats to detailed descriptions.</p>
        </div>
    </div>
</main>
<?php
include("assets/html/footer.html");
?>
</body>

</html>
