<?php


class getNews
{
    public function mainHtml(int $urlPage)
    {
        $this->generateNewsSql($urlPage);
    }

    public function getJson(int $urlPage)
    {
        $urlPrefix = "https://feed.nebulr.me/?action=display&bridge=NoMansSkyNews&q=";
        $urlSuffix = "&format=Json";
        $json = file_get_contents($urlPrefix . $urlPage . $urlSuffix);
        $data = json_decode($json, true);
        return $data;
    }

    public function generateNewsFeed(int $urlPage)
    {
        foreach ($this->getJson($urlPage) as $item) {
            $news_uri = $item["url"];
            $news_title = $item["title"];
            $news_timestamp_orig = $item["timestamp"];
            $news_timestamp = date('F d\, Y \a\t h:iA', $news_timestamp_orig);
            $news_content = $item["teaser"];
            $news_enclosures = $item["image"];
            echo "
            <a  style='text-decoration: none; color: inherit' href='$news_uri'>
                <div class='news'>
                    <img alt='news image' class='news-img' src='$news_enclosures'><br>
                    <h2 style='margin-bottom: 5px' class='lato news-text-padding-side'>$news_title</h2>
                    <div class='text-small text-light lato news-text-padding-side'>$news_timestamp</div><br>
                    <div class='text-light lato news-text-padding-side news-text-padding-bottom'>$news_content</div><br>
                </div>
            </a>";
        }
    }

    public function generateNewsJson(int $count)
    {
        $count = $count * 10 - 10;
        $server = "localhost:3306";
        $username = "atlas";
        $password = "K*8}HB?stZQ(:5r%JpRc";
        $database = "atlas";

        $connect = mysqli_connect("$server", "$username", "$password", "$database");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql_get = "SELECT id, url, title, timestamp, date, teaser, image, content FROM news ORDER BY id DESC LIMIT 10 OFFSET " . "$count";
        $data = mysqli_query($connect, $sql_get);
        $output = array();

        if (mysqli_num_rows($data) > 0) {
            while ($row = mysqli_fetch_assoc($data)) {
                $output[]=$row;
            }
        }

        header('Content-Type: application/json');
        echo json_encode($output);
        mysqli_close($connect);
    }

    public function generateNewsJsonAll()
    {
        $server = "localhost:3306";
        $username = "atlas";
        $password = "K*8}HB?stZQ(:5r%JpRc";
        $database = "atlas";

        $connect = mysqli_connect("$server", "$username", "$password", "$database");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql_get = "SELECT id, url, title, timestamp, date, teaser, image, content FROM news ORDER BY id DESC";
        $data = mysqli_query($connect, $sql_get);
        $output = array();

        if (mysqli_num_rows($data) > 0) {
            while ($row = mysqli_fetch_assoc($data)) {
                $output[]=$row;
            }
        }

        header('Content-Type: application/json');
        echo json_encode($output);
        mysqli_close($connect);
    }

    public function generateNewsSql(int $count)
    {
        $count = $count * 10 - 10;
        $server = "localhost:3306";
        $username = "atlas";
        $password = "K*8}HB?stZQ(:5r%JpRc";
        $database = "atlas";

        $connect = mysqli_connect("$server", "$username", "$password", "$database");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql_get = "SELECT url, title, timestamp, date, teaser, image, content FROM news ORDER BY id DESC LIMIT 10 OFFSET " . "$count";
        $data = mysqli_query($connect, $sql_get);

        if (mysqli_num_rows($data) > 0) {
            while ($row = mysqli_fetch_assoc($data)) {
                echo "
                <a  style='text-decoration: none; color: inherit' href=" . $row["url"] . ">
                    <div class='news'>
                        <img alt='news image' class='news-img' src=" . $row["image"] . "><br>
                        <h2 style='margin-bottom: 5px' class='lato news-text-padding-side'>" . $row["title"] . "</h2>
                        <div class='text-small text-light lato news-text-padding-side'>" . $row["date"] . "</div><br>
                        <div class='text-light lato news-text-padding-side news-text-padding-bottom'>" . $row["teaser"] . "</div><br>
                    </div>
                </a>";
            }
        }

        mysqli_close($connect);
    }

    public function nextPage(int $urlPage)
    {
        $this->generateNewsSql($urlPage);
    }

    public function mainSql()
    {
        $this->getJsonAll();
        echo 'News updated!';
    }

    public function mainSqlSet()
    {
        $this->getJsonAllSet();
        echo 'News updated!';
    }

    public function mainSqlUpdate()
    {
        $this->getJsonAllUpdate();
        echo 'News updated!';
    }

    public function getJsonAll()
    {
        $urlPrefix = "https://feed.nebulr.me/?action=display&bridge=NoMansSkyNews&q=";
        $urlSuffix = "&format=Json";
        $urlPage = 1;
        $error_string = "error";
        do {
            $json = file_get_contents($urlPrefix . $urlPage . $urlSuffix);
            $data = json_decode($json, true);
            foreach ($data as $item) {
                $this->querySql($item);
            }
            $urlPage++;
        } while (!(strpos($item["title"], $error_string)));
    }

    public function getJsonAllSet()
    {
        $urlPrefix = "https://feed.nebulr.me/?action=display&bridge=NoMansSkyNews&q=";
        $urlSuffix = "&format=Json";
        $urlPage = 1;
        $error_string = "error";
        do {
            $json = file_get_contents($urlPrefix . $urlPage . $urlSuffix);
            $data = json_decode($json, true);
            foreach ($data as $item) {
                $this->querySqlSet($item);
            }
            $urlPage++;
        } while (!(strpos($item["title"], $error_string)));
    }

    public function getJsonAllUpdate()
    {
        $urlPrefix = "https://feed.nebulr.me/?action=display&bridge=NoMansSkyNews&q=";
        $urlSuffix = "&format=Json";
        $urlPage = 1;
        $error_string = "error";
        do {
            $json = file_get_contents($urlPrefix . $urlPage . $urlSuffix);
            $data = json_decode($json, true);
            foreach ($data as $item) {
                $this->querySqlUpdate($item);
            }
            $urlPage++;
        } while (!(strpos($item["title"], $error_string)));
    }

    public function querySql($item)
    {
        $this->querySqlSet($item);
        $this->querySqlUpdate($item);
    }

    public function querySqlSet($item)
    {
        $server = "localhost:3306";
        $username = "atlas";
        $password = "K*8}HB?stZQ(:5r%JpRc";
        $database = "atlas";

        $timestamp = date('F d\, Y \a\t h:iA', $item['timestamp']);
        $connect = mysqli_connect("$server", "$username", "$password", "$database");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        };

        $sql_set = "INSERT INTO news (url, title, timestamp, date, teaser, image, content) 
					SELECT d.*
					FROM (SELECT
							'" . $item["url"] . "', '" . $item["title"] . "', '" . $item["timestamp"] . "', '" . $timestamp . "', '" . $item["teaser"] . "', '" . $item["image"] . "', '" . $item["content"] . "') AS d
					WHERE 0 IN (SELECT COUNT(*)
					FROM news WHERE url='" . $item["url"] . "' AND title='" . $item["title"] . "')";
        mysqli_query($connect, $sql_set);
        var_dump(mysqli_error_list($connect));
        mysqli_close($connect);
    }

    public function querySqlUpdate($item)
    {
        $server = "localhost:3306";
        $username = "atlas";
        $password = "K*8}HB?stZQ(:5r%JpRc";
        $database = "atlas";

        $timestamp = date('F d\, Y \a\t h:iA', $item['timestamp']);
        $connect = mysqli_connect("$server", "$username", "$password", "$database");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        };

        $sql_update = "UPDATE news SET url='" . $item["url"] . "', title='" . $item["title"] . "', date='" . $timestamp . "', teaser='" . $item["teaser"] . "', image='" . $item["image"] . "', content='" . $item["content"] . "' WHERE timestamp='" . $item["timestamp"] . "'";
        mysqli_query($connect, $sql_update);
        var_dump(mysqli_error_list($connect));
        mysqli_close($connect);
    }
}