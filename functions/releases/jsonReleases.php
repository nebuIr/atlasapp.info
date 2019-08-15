<?php
include_once("getReleases.php");
$Releases = new getReleases();
$Releases->generateReleasesJson($_GET['p']);