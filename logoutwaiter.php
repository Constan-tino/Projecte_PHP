<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- change to iso-8859-1 if you use that -->
    <meta charset="utf-8">
    <title>Title</title>
</head>

<body>
<?php
    $_SESSION=[];
    session_destroy();
    setcookie("waiter","",time()-3600);
    header('Location: handel.php');
?>
</body>

</html>