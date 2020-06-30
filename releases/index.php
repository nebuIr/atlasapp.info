<!DOCTYPE>
<html lang="en">

<head>
    <title>Atlas for No Man's Sky | Game Releases</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/html/head.php") ?>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/assets/php/Components.php') ?>
    <?php $components = new Components() ?>
</head>

<body>

<?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/html/nav.php") ?>

<main>
    <div class="grid">
        <?= $components->getReleases(0, 10) ?>
    </div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/html/footer.php") ?>
</body>
</html>