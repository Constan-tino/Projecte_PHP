<?php
    ini_set('display_errors', 1);
                        error_reporting(E_ALL);
                        session_start();
                        //echo "Session started";
    if (isset($_SESSION['chef'])) {
?>
<!doctype html>
<html lang="es">

<head>
    <!-- change to utf-8 if you use that -->
    <meta charset="ISO-8859-1">
    <title>Aplicación</title>
    <link rel="stylesheet" href="handel.css">
</head>
<body>
<?php

$servername = "bbdd.comeeahora.com";
$username = "Tino";
$database = "comeahora";
$password = "12345678Aa";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * from requests where Hecho = 0";
$id = "SELECT count(Id) from requests where Hecho = 0 group by Id";
echo "<input type=\"number\" class=\"hide\" name=\"n_id\" value=\"$id\">";
$contador = 1;
$result= mysqli_query($conn, $sql);
$chequeo = mysqli_num_rows($result);
echo "<form action=\"subirdatos.php\" method=\"post\">";
echo "<h1>Comandas</h1>";
echo "<div>";
if ($chequeo>0) {
    echo "<table><tr><th>Id</th><th>Mesa</th><th>Entrante</th><th>Bebida</th><th>Primer plato</th><th>Segundo plato</th><th>Postre</th><th>Hecho</th></tr>";
    while ($row = mysqli_fetch_assoc($result)){ 
        //for loop better than this line
        echo "<tr><td>".$row['Id']."</td><td>".$row['Mesa']."</td><td>".$row['Name']."</td><td>".$row['Entrante']."</td><td>".$row['Bebida']."</td><td>".$row['Primer plato']."</td><td>".$row['Segundo plato']."</td><td>".$row['Postre']."</td><td>"
        echo "<input type=\"checkbox\" name=\"c".$contador."\" value=\"".$row['Id']."\">";
        echo "</td></tr>";
        $contador++;
    }
    echo "</table></div>";
    echo "<input class=\"enviarcomanda\" type=\"submit\" value=\"Enviar comanda\" class=\"boton\">";
    echo "</form>";
} else {
    echo "No hay niguna petición de reserva :( <br>";
}
mysqli_close($conn);

if($_SERVER['REQUEST_METHOD']=="POST") {

    for($i=1; $i<=$_POST['n_id']; $i++) {
        if(!empty($_POST["c$i"])) {
            $sql = "UPDATE requests SET Hecho = 1 WHERE Id = '$_POST['c$i']'";
            $result= mysqli_query($conn, $sql);
        }
    }
    header('Location: kitchen.php');
}

echo "</body></html>";
sleep(30);
header('Location: kitchen.php');
}else {
    header('Location: login.php');
//echo "Logeate";
}
    ?>