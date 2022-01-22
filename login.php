<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="login.php" method="post">
    <label>Nombre de usuario:</label><br>
    <input type="text" name="username">
<br><br>
    <label>Contraseña:</label><br>
    <input type="text" name="password">

    <input type="submit" value="LogIn">
</form>

<?php 

if($_SERVER['REQUEST_METHOD']=="POST") {

    function saveoncookie() {

    }

    $login=array("waiter"=>"12345", "chef"=>"54321");

    $user=$_POST['username'];
    $pass=$_POST['password'];

    foreach ($login as $key => $value) {
        if ($key==$user && $value==$pass) {
            if ($user=="waiter") {
                header('handel.php');
            } else {
                header('kitchen.php');
            }
        } else {

        }
            
    }
}

?>
</body>
</html>