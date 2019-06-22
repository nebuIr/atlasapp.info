<?php
include_once("getNews.php");
$News = new getNews();
$News->generateNewsJson($_GET['p']);