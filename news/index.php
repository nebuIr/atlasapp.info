<!DOCTYPE>
<html lang="en">

<head>
    <title>News</title>
    <?php
    include($_SERVER['DOCUMENT_ROOT']."/assets/html/head.html");
    ?>
</head>

<body>

<nav>
    <ul>
        <li style="margin-right: 10px; margin-top: 1px"><a href="/"><img alt="atlas logo"
                                                        style="width: 50px; height: 50px; margin-top: -15px; border-radius: 15px"
                                                        src="/assets/img/brand/logo_square_512px.png"/></a>
        </li>
        <li><a href="/">Home</a></li>
        <li><a href="/media">Screenshots</a></li>
        <li><a class="active" href="#">News</a></li>
        <li><a href="/releases">Releases</a></li>
        <li><a href="/twitter">Twitter</a></li>
        <?php
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        if (stripos($agent, 'android') !== false) {
            echo "<li><a target=\"_blank\" href=\"/home\">Open App</a></li>";
        } ?>
    </ul>
</nav>

<main>
    <div class="grid">
        <?php
        include_once($_SERVER['DOCUMENT_ROOT']."/functions/feed/handler/news/getNews.php");
        $urlPage = 1;
        $News = new getNews();
        $News->mainHtml($urlPage);
        ?>
        <?php
        if (array_key_exists('next_page', $_POST)) {
            $urlPage++;
            $News->nextPage($urlPage);
        }
        ?>
        <form method="post">
            <input style="border-style: none; margin-top: 100px;" class="button" type="submit" name="next_page"
                   id="next_page" value="Load more..."/>
        </form>
</main>
<?php
include ($_SERVER['DOCUMENT_ROOT']."/assets/html/footer.html");
?>
</body>
</html>