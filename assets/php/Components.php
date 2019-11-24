<?php


class Components
{
    public $base_url = 'https://api.nebulr.dev/atlas/v1/';

    function renderNews() {
        $url = $this->base_url . 'news';
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
                    <div class='news-text text-light lato news-text-padding-side news-text-padding-bottom'>" . $news['excerpt'] . "</div><br>
                </div>
            </a>";
        }
    }

    function renderReleases() {
        $url = $this->base_url . 'releases';
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
                    <div class='releases-text text-light lato news-text-padding-side news-text-padding-bottom'>" . $releases['excerpt'] . "</div><br>
                </div>
            </a>";
        }
    }
}