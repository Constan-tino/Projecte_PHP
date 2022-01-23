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
$result= mysqli_query($conn, $sql);
$chequeo = mysqli_num_rows($result);
echo "<h1>Comandas</h1>";
echo "<div>";
if ($chequeo>0) {
    echo "<table><tr><th>Id</th><th>Mesa</th><th>Entrante</th><th>Bebida</th><th>Primer plato</th><th>Segundo plato</th><th>Postre</th><th>Hecho</th></tr>";
    while ($row = mysqli_fetch_assoc($result)){ 
        //for loop better than this line
        echo "<tr><td>".$row['Id']."</td><td>".$row['Mesa']."</td><td>".$row['Name']."</td><td>".$row['Entrante']."</td><td>".$row['Bebida']."</td><td>".$row['Primer plato']."</td><td>".$row['Segundo plato']."</td><td>".$row['Postre']."</td><td>"
        echo "<input type=\"checkbox\" name=\"c\" value=\"".$row['Id']."\">";
        echo "</td></tr>";
    }
    echo "</table></div>";
} else {
    echo "No hay niguna petición de reserva :( <br>";
}


if($_SERVER['REQUEST_METHOD']=="POST") {
    for() {
        $sql = "UPDATE requests SET Hecho = 1 WHERE Id = '$_POST['']'";
        $result= mysqli_query($conn, $sql);
    }
    header('kitchen.php');
}

function updateTable($ids) {

}

mysqli_close($conn);

sleep(20);
header('kitchen.php');

?>