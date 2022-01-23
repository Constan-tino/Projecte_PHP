<?php
//comprobamos que la session esta abierta
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();
    //echo "Session started";

    $login=array("waiter"=>"12345", "chef"=>"54321");

    if(isset($_SESSION['waiter'])){
        header('Location: handel.php');
    }elseif(isset($_SESSION['chef'])){
        header('Location: kitchen.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login comeahora</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login" >
        <form action="login.php" method="post">
            <h1>ComeAhora</h1>
            <br>
        <div class="users">    
            <label>Nombre de usuario:</label><br>
            <input type="text" name="username">
            <br><br>
            <label>Contraseña:</label><br>
            <input type="text" name="password">
            <input type="submit" value="LogIn">
            <br>
        </div>
        </form>
    </div>
<?php 

if($_SERVER['REQUEST_METHOD']=="POST") {
    $user=$_POST['username'];
    $pass=$_POST['password'];

    foreach ($login as $key => $value) {
        if ($key==$user && $value==$pass) {
            if ($user=="waiter") {

                    $_SESSION['waiter']= $user;
                    header('Location: handel.php');
                    //echo $_SESSION['waiter'];
                //echo "Las credenciales són correctas<br>";
                //echo "<a href='handel.php'>Entrar a la página</a>";
            } else {
                $_SESSION['chef']= $user;
                header('Location: kitchen.php');
                //echo $_SESSION['chef'];
                //echo "Las credenciales són correctas<br>";
                //echo "<a href='kitchen.php'>Entrar a la página</a>";
            }
        } else {
            echo "Credenciales incorrectos";
        }
            
    }
}

?>
</body>
</html>