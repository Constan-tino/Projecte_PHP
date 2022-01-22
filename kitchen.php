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
$result= mysqli_query($conn, $sql);
$chequeo = mysqli_num_rows($result);
echo "<h1>Comandas</h1>";
echo "<div>";
if ($chequeo>0) {
    echo "<table><tr><th>Id</th><th>Mesa</th><th>Entrante</th><th>Bebida</th><th>Primer plato</th><th>Segundo plato</th><th>Postre</th><th>Hecho</th></tr>";
    while ($row = mysqli_fetch_assoc($result)){ 
        //for loop better than this line
        echo "<tr><td>".$row['Id']."</td><td>".$row['Mesa']."</td><td>".$row['Name']."</td><td>".$row['Entrante']."</td><td>".$row['Bebida']."</td><td>".$row['Primer plato']."</td><td>".$row['Segundo plato']."</td><td>".$row['Postre']."</td><td>"
        echo "<input type=\"checkbox\" name=\"".$row['Id']."\" value=\"".$row['Id']."\">";
        echo "</td></tr>";
    }
    echo "</table></div>";
} else {
    echo "No hay niguna petición de reserva :( <br>";
}

function updateTable($ids) {
    for() {
        $sql = "UPDATE requests SET Hecho = 1 WHERE Id = 'sadsad'";
        $result= mysqli_query($conn, $sql);
    }
}

mysqli_close($conn);

?>