<?php


class getTwitter
{
    public function mainHtml(int $urlPage)
    {
        $this->generateTwitterSql($urlPage);
    }

    public function getJson()
    {
        $url = "https://feed.nebulr.me/?action=display&bridge=Twitter&u=nomanssky&format=Json";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        return $data;
    }

    public function generateTwitterFeed()
    {
        foreach ($this->getJson() as $item) {
            $twitter_uri = $item["uri"];
            $twitter_timestamp = $item["timestamp"];
            $twitter_username = $item["username"];
            $twitter_fullname = $item["fullname"];
            $twitter_author = $item["author"];
            $twitter_avatar = $item["avatar"];
            $twitter_id = $item["id"];
            $twitter_title = $item["title"];
            $twitter_content = $item["content"];
            $twitter_enclosures = $item["enclosures"];
            echo "
            <a  style='text-decoration: none; color: inherit' href='$twitter_uri'>
                <div class='news'>
                    <img alt='news image' class='news-img' src='$twitter_enclosures'><br>
                    <h2 style='margin-bottom: 5px' class='nms news-text-padding-side'>$twitter_title</h2>
                    <div class='text-small text-light news-text-padding-side'>$twitter_timestamp</div><br>
                    <div class='text-light news-text-padding-side news-text-padding-bottom'>$twitter_content</div><br>
                    <div class='text-light news-text-padding-side news-text-padding-bottom'>$twitter_username</div><br>
                    <div class='text-light news-text-padding-side news-text-padding-bottom'>$twitter_fullname</div><br>
                    <div class='text-light news-text-padding-side news-text-padding-bottom'>$twitter_author</div><br>
                    <div class='text-light news-text-padding-side news-text-padding-bottom'>$twitter_avatar</div><br>
                    <div class='text-light news-text-padding-side news-text-padding-bottom'>$twitter_id</div><br>
                </div>
            </a>";
        }
    }

    public function generateTwitterJson(int $count)
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

        $sql_get = "SELECT uri, timestamp, username, fullname, author, avatar, twitter_id, title, enclosures FROM twitter ORDER BY twitter_id DESC LIMIT 10 OFFSET " . "$count";
        $data = mysqli_query($connect, $sql_get);
        $output = array();

        if (mysqli_num_rows($data) > 0) {
            while ($row = mysqli_fetch_assoc($data)) {
                $output[]=$row;
            }
        }

        echo json_encode($output);
        mysqli_close($connect);
    }

    public function generateTwitterSql(int $count)
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

        $sql_get = "SELECT uri, timestamp, username, fullname, author, avatar, twitter_id, title, enclosures FROM twitter ORDER BY twitter_id DESC LIMIT 10 OFFSET " . "$count";
        $data = mysqli_query($connect, $sql_get);

        if (mysqli_num_rows($data) > 0) {
            while ($row = mysqli_fetch_assoc($data)) {
                $twitter_uri = $row["uri"];
                $twitter_timestamp = $row["timestamp"];
                $twitter_username = $row["username"];
                $twitter_fullname = $row["fullname"];
                $twitter_avatar = $row["avatar"];
                $twitter_title = $row["title"];
                $twitter_enclosures = $row["enclosures"];
                echo "
                <a  style='text-decoration: none; color: inherit' href='$twitter_uri'>
                    <div class='twitter'>
                        <div class='twitter-info'>
                            <img alt='twitter avatar' class='twitter-avatar' src='$twitter_avatar'>
                            <div class='twitter-info-content'>
                                <div class='twitter-fullname'>$twitter_fullname</div>
                                <div class='twitter-username text-small text-light'>$twitter_username</div>
                                <div class='twitter-timestamp text-small text-light'>$twitter_timestamp</div><br>
                            </div>
                        </div>
                        <div class='twitter-content'>$twitter_title</div><br>";
                if ($twitter_enclosures != null) {
                    echo "<img alt='twitter image' class='twitter-img' src='$twitter_enclosures'><br>";
                }
                    echo "
                    </div>
                </a>";
            }
        }

        mysqli_close($connect);
    }

    public function nextPage(int $urlPage)
    {
        $this->generateTwitterSql($urlPage);
    }

    public function mainSql()
    {
        $this->getJsonAll();
        echo 'Twitter updated!';
    }

    public function mainSqlSet()
    {
        $this->getJsonAllSet();
        echo 'Twitter updated!';
    }

    public function mainSqlUpdate()
    {
        $this->getJsonAllUpdate();
        echo 'Twitter updated!';
    }

    public function getJsonAll()
    {
        $url = "https://feed.nebulr.me/?action=display&bridge=Twitter&u=nomanssky&format=Json";
            $json = file_get_contents($url);
            $data = json_decode($json, true);
            foreach ($data as $item) {
                $this->querySql($item);
            }
    }

    public function getJsonAllSet()
    {
        $url = "https://feed.nebulr.me/?action=display&bridge=Twitter&u=nomanssky&format=Json";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        foreach ($data as $item) {
            $this->querySqlSet($item);
        }
    }

    public function getJsonAllUpdate()
    {
        $url = "https://feed.nebulr.me/?action=display&bridge=Twitter&u=nomanssky&format=Json";
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

        $sql_update = "UPDATE twitter SET uri='" . $item["uri"] . "', timestamp='" . $item["timestamp"] . "', username='" . $item["username"] . "', fullname='" . $item["fullname"] . "', author='" . $item["author"] . "', avatar='" . $item["avatar"] . "', twitter_id='" . $item["id"] . "', title='" . $item["title"] . "', content='" . $item["content"] . "', enclosures='" . implode($item["enclosures"]) . "' WHERE twitter_id='" . $item["id"] . "'";
        $sql_set = "INSERT INTO twitter(uri, timestamp, username, fullname, author, avatar, twitter_id, title, content, enclosures) VALUES('" . $item["uri"] . "', '" . $item["timestamp"] . "', '" . $item["username"] . "', '" . $item["fullname"] . "', '" . $item["author"] . "', '" . $item["avatar"] . "', '" . $item["id"] . "', '" . $item["title"] . "', '" . $item["content"] . "', '" . implode($item["enclosures"]) . "')";
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

        $timestamp = date('F d\, Y \a\t h:iA', $item['timestamp']);
        $connect = mysqli_connect("$server", "$username", "$password", "$database");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        };

        $sql_set = "INSERT INTO twitter(uri, timestamp, username, fullname, author, avatar, twitter_id, title, content, enclosures) VALUES('" . $item["uri"] . "', '" . $item["timestamp"] . "', '" . $item["username"] . "', '" . $item["fullname"] . "', '" . $item["author"] . "', '" . $item["avatar"] . "', '" . $item["id"] . "', '" . $item["title"] . "', '" . $item["content"] . "', '" . implode($item["enclosures"]) . "')";
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

        $sql_update = "UPDATE twitter SET uri='" . $item["uri"] . "', timestamp='" . $item["timestamp"] . "', username='" . $item["username"] . "', fullname='" . $item["fullname"] . "', author='" . $item["author"] . "', avatar='" . $item["avatar"] . "', twitter_id='" . $item["id"] . "', title='" . $item["title"] . "', content='" . $item["content"] . "', enclosures='" . implode($item["enclosures"]) . "' WHERE twitter_id='" . $item["id"] . "'";
        mysqli_query($connect, $sql_update);
        var_dump(mysqli_error_list($connect));
        mysqli_close($connect);
    }
}