<?php
include_once("getReleases.php");
$News = new getReleases();
$News->generateReleasesJson($_GET['p']);