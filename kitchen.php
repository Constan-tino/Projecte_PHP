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
<form action="kitchen.php" method="post">
<?php

$servername = "localhost";
$username = "root";
$database = "comeahora";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * from requests where Hecho = 0;";
$contador = 1;
$result= mysqli_query($conn, $sql);
$chequeo = mysqli_num_rows($result);
echo "<h1>Comandas</h1>";
echo "<div>";
if ($chequeo>0) {
    echo "<table><tr><th>Id</th><th>Mesa</th><th>Entrante</th><th>Bebida</th><th>Primer_Plato</th><th>Segundo_Plato</th><th>Postre</th><th>Hecho</th></tr>";
    while ($row = mysqli_fetch_assoc($result)){ 
        //for loop better than this line
        echo "<tr><td>".$row['ID']."</td><td>".$row['Mesa']."</td><td>".$row['Entrante']."</td><td>".$row['Bebida']."</td><td>".$row['Primer_Plato']."</td><td>".$row['Segundo_Plato']."</td><td>".$row['Postre']."</td><td>";
        echo "<input type=\"checkbox\" name=\"c".$contador."\" value=\"".$row['ID']."\">";
        echo "</td></tr>";
        $contador++;
    }
    echo "</table></div>";
    echo "<input class=\"enviarcomanda\" type=\"submit\" value=\"Actualizar comandas\" class=\"boton\">";
    echo "</form>";
    mysqli_close($conn);
} else {
    echo "No hay niguna petición :( <br>";
}

if($_SERVER['REQUEST_METHOD']=="POST") {


    $servername = "localhost";
    $username = "root";
    $database = "comeahora";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $ids = "SELECT count(Id) as Ids from requests where Hecho = 0;";
    $result= mysqli_query($conn, $ids);
    $row = mysqli_fetch_assoc($result);
    $n_id = intval($row['Ids']);
    for($i=1; $i<=$n_id; $i++) {
        if(!empty($_POST["c$i"])) {
            $id = $_POST["c$i"];
            $sql = "UPDATE requests SET Hecho = 1 WHERE Id = $id;";
            $result= mysqli_query($conn, $sql);
        }
    }
    header('Location: kitchen.php');
}

echo "</body></html>";
}else {
    header('Location: login.php');
//echo "Logeate";
}
?>