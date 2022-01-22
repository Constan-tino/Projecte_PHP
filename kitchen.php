<?php

$servername = "bbdd.comeeahora.com";
$username = "Tino";
$database = "comeahora";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

for($i=0; $i<$n_people; $i++) {
    $sql = "INSERT INTO requests (Id, Mesa, Hecho, Entrante, Primer plato, Segundo plato, Postre, Bebida) VALUES ($id, $mesa, 0, '$entrante[$i]', '$f_dish[$i]', '$s_dish[$i]', '$dessert[$i]', '$drinks[$i]')";
    if (mysqli_query($conn, $sql)) {
        echo "La comanda se a enviado correctamente";
        sleep(5);
        header('handel.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>