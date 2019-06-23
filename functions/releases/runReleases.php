<?php
if (php_sapi_name() != 'cli') {
    throw new Exception('This application must be run on the command line.');
}

include_once("getReleases.php");
$News = new getReleases();
$News->mainSql();