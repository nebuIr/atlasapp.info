<?php


class getVersion
{
    public function mainHtml()
    {
        $this->generateVersionSql();
    }

    public function getJson()
    {
        $url = "https://feed.nebulr.me/?action=display&bridge=NoMansSkyVersion&format=Json";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        return $data;
    }

    public function generateVersionFeed()
    {
        foreach ($this->getJson() as $item) {
            $version_uri = $item["uri"];
            $version_title = $item["title"];
            $version_content = $item["content"];
            echo "
            <a  style='text-decoration: none; color: inherit' href='$version_uri'>
                <div class='news'>
                    <h2 style='margin-bottom: 5px' class='nms news-text-padding-side'>$version_title</h2>
                    <div class='text-light news-text-padding-side news-text-padding-bottom'>$version_content</div><br>
                </div>
            </a>";
        }
    }

    public function generateVersionJson()
    {
        $server = "localhost:3306";
        $username = "atlas";
        $password = "K*8}HB?stZQ(:5r%JpRc";
        $database = "atlas";

        $connect = mysqli_connect("$server", "$username", "$password", "$database");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql_get = "SELECT id, uri, title, content FROM version";
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

    public function generateVersionSql()
    {
        $server = "localhost:3306";
        $username = "atlas";
        $password = "K*8}HB?stZQ(:5r%JpRc";
        $database = "atlas";

        $connect = mysqli_connect("$server", "$username", "$password", "$database");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql_get = "SELECT uri, title, content FROM version ";
        $data = mysqli_query($connect, $sql_get);

        if (mysqli_num_rows($data) > 0) {
            while ($row = mysqli_fetch_assoc($data)) {
                echo "
                <a  style='text-decoration: none; color: inherit' href=" . $row["uri"] . ">
                    <div class='version-div'>
                        <div class='version-note text-light'>Latest version:</div>
                        <h2 style='margin-bottom: 5px' class='version-title nms news-text-padding-side'>" . $row["title"] . "</h2>
                        <div class='version text-light news-text-padding-side'>" . $row["content"] . "</div><br>
                    </div>
                </a>";
            }
        }

        mysqli_close($connect);
    }

    public function mainSqlSet()
    {
        $this->getJsonAllSet();
        echo 'Version updated!';
    }

    public function mainSqlUpdate()
    {
        $this->getJsonAllUpdate();
        echo 'Version updated!';
    }

    public function getJsonAllSet()
    {
        $url = "https://feed.nebulr.me/?action=display&bridge=NoMansSkyVersion&format=Json";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        foreach ($data as $item) {
            $this->querySqlSet($item);
        }
    }

    public function getJsonAllUpdate()
    {
        $url = "https://feed.nebulr.me/?action=display&bridge=NoMansSkyVersion&format=Json";
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        foreach ($data as $item) {
            $this->querySqlUpdate($item);
        }
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

        $sql_set = "INSERT INTO version(uri, title, content) VALUES('" . $item["uri"] . "', '" . $item["title"] . "', '" . $item["content"] . "')";
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

        $sql_update = "UPDATE version SET uri='" . $item["uri"] . "', title='" . $item["title"] . "', content='" . $item["content"] . "' WHERE id='0'";
        mysqli_query($connect, $sql_update);
        var_dump(mysqli_error_list($connect));
        mysqli_close($connect);
    }
}