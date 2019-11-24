<!DOCTYPE>
<html lang="en">

<head>
    <title>Atlas for No Man's Sky | Game Releases</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/html/head.php"); ?>
</head>

<body>

<?php include($_SERVER['DOCUMENT_ROOT']."/assets/html/nav.php"); ?>

<main>
    <div class="grid">
        <?php
        $url = 'https://api.nebulr.dev/atlas/v1/releases';
        $url_content = file_get_contents($url);
        $releases_array = json_decode($url_content, true);

        foreach ($releases_array as $releases) {
            $platforms = "";
            if ($releases['platforms']['pc']) {
                $platforms .= "PC";
            }
            if ($releases['platforms']['ps4']) {
                $platforms .= " " . "PS4";
            }
            if ($releases['platforms']['xbox']) {
                $platforms .= " " . "Xbox One";
            }
            $pattern = array("PC", "PS4", "Xbox One");
            $replace = array("<div class='platform platform-pc lato-medium'>PC</div>", "<div class='platform platform-ps4 lato-medium'>PS4</div>", "<div class='platform platform-xbox lato-medium'>Xbox One</div>");
            $platforms = str_replace($pattern, $replace, $platforms);
            $releases['platforms'] = $platforms;

            echo "
            <a  style='text-decoration: none; color: inherit' href=" . $releases['url'] . ">
                <div class='news'>
                    <img alt='release image' class='news-img' src=" . $releases['images']['image_large'] . "><br>
                    <h2 style='margin-bottom: 5px' class='lato news-text-padding-side'>" . $releases['title'] . "</h2>
                    <div class='platforms-wrap'>" . $releases['platforms'] . "</div><br>
                    <div class='text-light lato news-text-padding-side news-text-padding-bottom'>" . $releases['excerpt'] . "</div><br>
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