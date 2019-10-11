<!DOCTYPE>
<html lang="en">

<head>
    <title>Releases</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/html/head.php"); ?>
</head>

<body>

<?php include($_SERVER['DOCUMENT_ROOT']."/assets/html/nav.php"); ?>

<main>
    <div class="grid">
        <?php
        include_once($_SERVER['DOCUMENT_ROOT']."/functions/feed/handler/releases/main.php");
        include_once($_SERVER['DOCUMENT_ROOT']."/functions/feed/handler/version/main.php");
        $urlPage = 1;
        $Version = new getVersion();
        $Version->mainHtml();
        $Releases = new getReleases();
        $Releases->mainHtml($urlPage);
        ?>
        <?php
        if (array_key_exists('next_page', $_POST)) {
            $urlPage++;
            $Releases->nextPage($urlPage);
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