<!DOCTYPE>
<html lang="en">

<head>
    <title>Atlas for No Man's Sky | Game News</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/assets/html/head.php"); ?>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . '/assets/php/Components.php'); ?>
    <?php $components = new Components(); ?>
</head>

<body>

<?php include($_SERVER['DOCUMENT_ROOT']."/assets/html/nav.php"); ?>

<main>
    <div class="grid">
        <?php
        $components->renderNews();
        ?>
        <form method="post">
            <input style="border-style: none; margin-top: 100px;" class="button" type="submit" name="next_page"
                   id="next_page" value="Load more..."/>
        </form>
</main>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/assets/html/footer.php");
?>
</body>
</html>