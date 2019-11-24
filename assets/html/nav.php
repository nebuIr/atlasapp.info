<?php
$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>

<nav>
    <ul>
        <li class="only-desktop" style="margin-right: 10px; margin-top: 1px"><a href="/"><img alt="atlas logo" class="nav-logo" src="/assets/img/brand/logo_square_512px.png"/></a></li>
        <li><a <?php if ($url == "https://atlas.nebulr.me/" || $url == "https://atlas.localhost/") {echo "class='active'";}?>href="/">Home</a></li>
        <li><a <?php if (strpos($url,'/media') !== false) {echo "class='active'";}?>href="/media">Screenshots</a></li>
        <li><a <?php if (strpos($url,'/news') !== false) {echo "class='active'";}?>href="/news">News</a></li>
        <li><a <?php if (strpos($url,'/releases') !== false) {echo "class='active'";}?>href="/releases">Releases</a></li>
        <li><a <?php if (strpos($url,'/twitter') !== false) {echo "class='active'";}?>href="/twitter">Twitter</a></li>
        <?php
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if (stripos($agent, 'android') !== false) {
            echo "<li><a target=\"_blank\" href=\"/home\">Open App</a></li>";
        } ?>
    </ul>
</nav>