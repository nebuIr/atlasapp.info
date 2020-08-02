<!DOCTYPE html>

<?php
include_once __DIR__ . '/../src/routes.php';
use atlas\Basics;
$basics = new Basics();
$error = $basics->errorCode()
?>

<html lang='en'>

<head>
    <title><?= $error[0] ?></title>
    <?php include_once __DIR__ . '/../src/templates/components/head.php' ?>
</head>

<body>

<?php include_once __DIR__ . '/../src/templates/components/nav.php' ?>

<main class='main-text-small'>
    <h1 class="center"><?= $error[0] ?></h1>
    <p class="center"><?= $error[1] ?></p>
</main>

<?php include_once __DIR__ . '/../src/templates/components/footer.php' ?>

</body>

</html>