<!DOCTYPE>
<html lang="en">

<head>
    <title>News</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/html/head.php"); ?>
</head>

<body>

<?php include($_SERVER['DOCUMENT_ROOT']."/assets/html/nav.php"); ?>

<main>
    <div class="grid">
        <?php
        $url = 'https://api.nebulr.dev/atlas/v1/news';
        $url_content = file_get_contents($url);
        $news_array = json_decode($url_content, true);

        foreach ($news_array as $news) {
            $news['timestamp'] = date('M d, Y H:m', $news['timestamp']);

            echo "
            <a style='text-decoration: none; color: inherit' href=" . $news['url'] . ">
                <div class='news'>
                    <img alt='news image' class='news-img' src=" . $news['images']['image_large'] . "><br>
                    <h2 style='margin-bottom: 5px' class='lato news-text-padding-side'>" . $news['title'] . "</h2>
                    <div class='text-small text-light lato news-text-padding-side'>" . $news['timestamp'] . "</div><br>
                    <div class='text-light lato news-text-padding-side news-text-padding-bottom'>" . $news['excerpt'] . "</div><br>
                </div>
            </a>";
        }
        ?>
        <form method="post">
            <input style="border-style: none; margin-top: 100px;" class="button" type="submit" name="next_page"
                   id="next_page" value="Load more..."/>
        </form>
</main>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/assets/html/footer.php");
?>
</body>
</html>