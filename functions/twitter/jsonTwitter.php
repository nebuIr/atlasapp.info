<?php
include_once("getTwitter.php");
$News = new getTwitter();
$News->generateTwitterJson($_GET['p']);