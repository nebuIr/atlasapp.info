<!DOCTYPE>
<html lang="en">

<head>
    <title>Screenshots</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/html/head.php"); ?>
</head>

<body>

<?php include($_SERVER['DOCUMENT_ROOT']."/assets/html/nav.php"); ?>

<main>
    <div class="grid">

        <?php
        $directory = ($_SERVER['DOCUMENT_ROOT']).'/assets/img/media/';
        chdir($directory);
        $files = glob('*.{jpg,png,gif}', GLOB_BRACE);
        foreach($files as $file) {
            echo "<div class='card card-mobile-screen'>
            <img alt='screenshot' class='card-img-full' src='/assets/img/media/$file'/>
            </div>";
        }
        ?>

    </div>
</main>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/assets/html/footer.php");
?>
</body>
</html>
