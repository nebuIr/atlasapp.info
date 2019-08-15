<?php
include_once("getTwitter.php");
$Twitter = new getTwitter();
$Twitter->generateTwitterJson($_GET['p']);