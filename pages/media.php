<!DOCTYPE>
<html>

<head>
    <title>Media</title>
    <link href="../assets/css/base.css" type="text/css" rel="stylesheet"/>
    <link rel="shortcut icon" href="../assets/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
    <script src="assets/js/base.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
</head>

<body>

<nav>
    <ul>
        <li style="margin-right: 10px"><a href="../index.php"><img
                style="width: 50px; height: 50px; margin-top: -15px;" src="../assets/img/brand/logo_circle_192px.png"/></a>
        </li>
        <li><a href="../index.php">Home</a></li>
        <li><a class="active" href="#">Media</a></li>
        <li><a href="news.php">News</a></li>
        <?php
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if(stripos($agent,'android') !== false) {
            echo "<li><a target=\"_blank\" href=\"../home\">Open App</a></li>";
        } ?>
    </ul>
</nav>

<main>
    <div class="grid">

        <div class="card">
            <img class="card-img-full" src="../assets/img/media/dash_1_dark.png"/>
        </div>

        <div class="card">
            <img class="card-img-full" src="../assets/img/media/dash_2_dark.png"/>
        </div>

        <div class="card">
            <img class="card-img-full" src="../assets/img/media/dash_3_dark.png"/>
        </div>

        <div class="card">
            <img class="card-img-full" src="../assets/img/media/resources_list_dark.png"/>
        </div>

        <div class="card">
            <img class="card-img-full" src="../assets/img/media/resources_details_dark.png"/>
        </div>

        <div class="card">
            <img class="card-img-full" src="../assets/img/media/products_details_dark.png"/>
        </div>

        <div class="card">
            <img class="card-img-full" src="../assets/img/media/achievements_dark.png"/>
        </div>

    </div>
</main>

<footer>
    <p class="card-text text-light">This website was created by <img src="/assets/img/brand/pp_16.png"> nebulr<br>Feel
        free to <a href="mailto:support@nebulr.me">send</a> any bug reports or feedback</p> <a
        href="../privacypolicy/index.html">Privacy Policy</a><br>
    <a href='https://play.google.com/store/apps/details?id=me.nebulr.atlas&utm_source=wh&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img
            style="transform: translate(-13px, 13px)" height="75px" alt='Get it on Google Play'
            src='https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png'/></a>
    <a class="github-button" href="https://github.com/xnebulr" data-count-href="/xnebulr/followers" data-size="large"
       aria-label="Follow @xnebulr on GitHub">Follow @xnebulr</a>
    <p style="font-size: 65%" class="text-light">Google Play and the Google Play logo are trademarks of Google LLC.</p>
</footer>

</body>
</html>