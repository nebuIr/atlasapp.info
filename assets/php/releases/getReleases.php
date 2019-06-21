<?php


class getReleases
{
    public function mainHtml(int $urlPage)
    {
        $this->generateReleasesSql($urlPage);
    }

    public function getJson()
    {
        $url = "https://feed.nebulr.me/?action=display&bridge=NoMansSkyReleaseLog&format=Json";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        return $data;
    }

    public function generateReleasesFeed()
    {
        foreach ($this->getJson() as $item) {
            $releases_uri = $item["uri"];
            $releases_title = $item["title"];
            $releases_platforms = $item["timestamp"];
            $releases_content = $item["content"];
            $releases_enclosures = $item["enclosures"];
            echo "
            <a  style='text-decoration: none; color: inherit' href='$releases_uri'>
                <div class='news'>
                    <img class='news-img' src='$releases_enclosures'><br>
                    <h2 style='margin-bottom: 5px' class='nms news-text-padding-side'>$releases_title</h2>
                    <div class='text-small text-light news-text-padding-side'>$releases_platforms</div><br>
                    <div class='text-light news-text-padding-side news-text-padding-bottom'>$releases_content</div><br>
                </div>
            </a>";
        }
    }

    public function generateReleasesSql(int $count)
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

        $sql_get = "SELECT uri, title, platforms, content, enclosures FROM releases ORDER BY id DESC LIMIT 10 OFFSET " . "$count";
        $data = mysqli_query($connect, $sql_get);

        if (mysqli_num_rows($data) > 0) {
            while ($row = mysqli_fetch_assoc($data)) {
                $pattern = array("PC", "PS4", "Xbox One");
                $replace = array("<div class='platform platform-pc'>PC</div>", "<div class='platform platform-ps4'>PS4</div>", "<div class='platform platform-xbox'>Xbox One</div>");
                $platforms = str_replace($pattern, $replace, $row["platforms"]);
                $row["platforms"] = $platforms;
                echo "
                <a  style='text-decoration: none; color: inherit' href=" . $row["uri"] . ">
                    <div class='news'>
                        <img class='news-img' src=" . $row["enclosures"] . "><br>
                        <h2 style='margin-bottom: 5px' class='nms news-text-padding-side'>" . $row["title"] . "</h2>
                        <div class='platforms-wrap'>" . $row["platforms"] . "</div><br>
                        <div class='text-light news-text-padding-side news-text-padding-bottom'>" . $row["content"] . "</div><br>
                    </div>
                </a>";
            }
        }

        mysqli_close($connect);
    }

    public function nextPage(int $urlPage)
    {
        $this->generateReleasesSql($urlPage);
    }

    public function mainSql()
    {
        $this->getJsonAll();
        echo 'Releases updated!';
    }

    public function mainSqlSet()
    {
        $this->getJsonAllSet();
        echo 'Releases updated!';
    }

    public function mainSqlUpdate()
    {
        $this->getJsonAllUpdate();
        echo 'Releases updated!';
    }

    public function getJsonAll()
    {
        $url = "https://feed.nebulr.me/?action=display&bridge=NoMansSkyReleaseLog&format=Json";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        foreach ($data as $item) {
            $this->querySql($item);
        }
    }

    public function getJsonAllSet()
    {
        $url = "https://feed.nebulr.me/?action=display&bridge=NoMansSkyReleaseLog&format=Json";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        foreach ($data as $item) {
            $this->querySqlSet($item);
        }
    }

    public function getJsonAllUpdate()
    {
        $url = "https://feed.nebulr.me/?action=display&bridge=NoMansSkyReleaseLog&format=Json";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        foreach ($data as $item) {
            $this->querySqlUpdate($item);
        }
    }

    public function querySql($item)
    {
        $server = "localhost:3306";
        $username = "atlas";
        $password = "K*8}HB?stZQ(:5r%JpRc";
        $database = "atlas";

        $connect = mysqli_connect("$server", "$username", "$password", "$database");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        };

        $sql_update = "UPDATE releases SET uri='" . $item["uri"] . "', title='" . $item["title"] . "', platforms='" . $item["timestamp"] . "', content='" . $item["content"] . "', enclosures='" . $item["enclosures"] . "' WHERE uri='" . $item["uri"] . "'";
        $sql_set = "INSERT INTO releases(uri, title, platforms, content, enclosures) VALUES('" . $item["uri"] . "', '" . $item["title"] . "', '" . $item["timestamp"] . "', '" . $item["content"] . "', '" . $item["enclosures"] . "')";
        mysqli_query($connect, $sql_update);
        mysqli_query($connect, $sql_set);
        var_dump(mysqli_error_list($connect));
        mysqli_close($connect);
    }

    public function querySqlSet($item)
    {
        $server = "localhost:3306";
        $username = "atlas";
        $password = "K*8}HB?stZQ(:5r%JpRc";
        $database = "atlas";

        $connect = mysqli_connect("$server", "$username", "$password", "$database");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        };

        $sql_set = "INSERT INTO releases(uri, title, platforms, content, enclosures) VALUES('" . $item["uri"] . "', '" . $item["title"] . "', '" . $item["timestamp"] . "', '" . $item["content"] . "', '" . $item["enclosures"] . "')";
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

        $connect = mysqli_connect("$server", "$username", "$password", "$database");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        };

        $sql_update = "UPDATE releases SET uri='" . $item["uri"] . "', title='" . $item["title"] . "', platforms='" . $item["timestamp"] . "', content='" . $item["content"] . "', enclosures='" . $item["enclosures"] . "' WHERE uri='" . $item["uri"] . "'";
        mysqli_query($connect, $sql_update);
        var_dump(mysqli_error_list($connect));
        mysqli_close($connect);
    }
}