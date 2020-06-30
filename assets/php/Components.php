<?php


class Components
{
    public $base_url = 'https://api.atlasapp.info/v1/';

    public function getNews($offset = 0, $limit = 0): string
    {
        $url = $this->base_url . 'news' . "?offset=$offset&limit=$limit";
        $url_content = file_get_contents($url);
        $news_array = json_decode($url_content, true);
        $news_cards = '';

        foreach ($news_array as $news) {
            $news['timestamp'] = date('M d, Y H:m', $news['timestamp']);
            $news_card = "
            <a style='text-decoration: none; color: inherit' href=" . $news['url'] . ">
                <div class='news'>
                    <img alt='news image' class='news-img' src=" . $news['images']['image_large'] . "><br>
                    <h2 style='margin-bottom: 5px' class='lato news-text-padding-side'>" . $news['title'] . "</h2>
                    <div class='text-small text-light lato news-text-padding-side'>" . $news['timestamp'] . "</div><br>
                    <div class='news-text text-light lato news-text-padding-side news-text-padding-bottom'>" . $news['excerpt'] . "</div><br>
                </div>
            </a>";

            $news_cards .= $news_card;
        }

        $news_next_button = "
        <form method=\"post\">
            <input style=\"border-style: none; margin-top: 100px;\" class=\"button\" type=\"submit\" name=\"next_page\"
                   id=\"next_page\" value=\"Load more...\"/>
        </form>";

        return $news_cards . $news_next_button;
    }

    public function getReleases($offset = 0, $limit = 0): string
    {
        $url = $this->base_url . 'releases';
        $url_content = file_get_contents($url);
        $releases_array = json_decode($url_content, true);
        $release_cards = '';

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
            $pattern = ["PC", "PS4", "Xbox One"];
            $replace = [
                "<div class='platform platform-pc lato-medium'>PC</div>",
                "<div class='platform platform-ps4 lato-medium'>PS4</div>",
                "<div class='platform platform-xbox lato-medium'>Xbox One</div>"
            ];
            $platforms = str_replace($pattern, $replace, $platforms);
            $releases['platforms'] = $platforms;

            $release_card = "
            <a  style='text-decoration: none; color: inherit' href=" . $releases['url'] . ">
                <div class='news'>
                    <img alt='news image' class='news-img' src=" . $releases['images']['image_large'] . "><br>
                    <h2 style='margin-bottom: 5px' class='lato news-text-padding-side'>" . $releases['title'] . "</h2>
                    <div class='platforms-wrap'>" . $releases['platforms'] . "</div><br>
                    <div class='releases-text text-light lato news-text-padding-side news-text-padding-bottom'>" . $releases['excerpt'] . "</div><br>
                </div>
            </a>";

            $release_cards .= $release_card;
        }

        return $release_cards;
    }
}