<!DOCTYPE html>
<?php include_once __DIR__ . '/../src/routes.php';
include_once __DIR__ . '/../src/classes/Basics.php';

use atlas\Basics;
$basics = new Basics();
$dir = $basics->getDirectory();
?>

<html lang='en'>

<?php include_once __DIR__ . '/../src/templates/components/head.php' ?>

<body>

<?php include_once __DIR__ . '/../src/templates/components/nav.php' ?>

<?php getPageContent($dir) ?>

<?php include_once __DIR__ . '/../src/templates/components/footer.php' ?>

</body>

</html>