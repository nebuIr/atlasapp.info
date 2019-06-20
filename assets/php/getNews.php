<?php


class getNews
{
    public function mainHtml(int $urlPage) {
        $this->generateNews($urlPage);
    }

    public function getJson(int $urlPage) {
        $url = "https://feed.nebulr.me/?action=display&bridge=NoMansSky&q=1&format=Json";
        $urlPrefix = "https://feed.nebulr.me/?action=display&bridge=NoMansSky&q=";
        $urlSuffix = "&format=Json";
        $json = file_get_contents($urlPrefix . $urlPage . $urlSuffix);
        $data = json_decode($json, true);
        return $data;
    }

    public function generateNews(int $urlPage) {
        foreach ($this->getJson($urlPage) as $item) {
            $news_uri = $item["uri"];
            $news_title = $item["title"];
            $news_timestamp_orig = $item["timestamp"];
            $news_timestamp = date('F d\, Y \a\t h:iA', $news_timestamp_orig);
            $news_content = $item["content"];
            $news_enclosures = $item["enclosures"];
            echo <<<NEWS
            <a  style='text-decoration: none; color: inherit' href='$news_uri'>
                <div class='news'>
                    <img class='news-img' src='$news_enclosures'><br>
                    <h2 style="margin-bottom: 5px" class='nms news-text-padding-side'>$news_title</h2>
                    <div class='text-small text-light news-text-padding-side'>$news_timestamp</div><br>
                    <div class='text-light news-text-padding-side news-text-padding-bottom'>$news_content</div><br>
                </div>
            </a>
            NEWS;
        }
    }

    public function nextPage(int $urlPage) {
        $this->generateNews($urlPage);
    }

    public function mainSql() {
        $this->getJsonAll();
        echo 'News updated!';
    }

    public function getJsonAll() {
        $urlPrefix = "https://feed.nebulr.me/?action=display&bridge=NoMansSky&q=";
        $urlSuffix = "&format=Json";
        $urlPage = 1;
        do {
            $json = file_get_contents($urlPrefix . $urlPage . $urlSuffix);
            $data = json_decode($json, true);
            foreach ($data as $item) {
                $this->querySql($item);
            }
            $urlPage++;
        } while ($item["title"] <=> "Bridge returned error 404! (18067)");
    }

    public function querySql($item) {
        $timestamp = date('F d\, Y \a\t h:iA', $item['timestamp']);
        $connect = mysqli_connect("localhost", "atlas", 'R$NcT8N_d3sMsR3', "atlas");
        $sql_set = "INSERT INTO news(uri, title, timestamp, date, content, enclosures) VALUES('".$item["uri"]."', '".$item["title"]."', '".$item["timestamp"]."', '".$timestamp."', '".$item["content"]."', '".$item["enclosures"]."')";
        mysqli_query($connect, $sql_set);
        var_dump(mysqli_error_list($connect));
    }
}