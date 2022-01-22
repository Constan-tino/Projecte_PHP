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

$n_people = $_POST['Comensales'];
$f_dish = array();
$s_dish = array();
$dessert = array();
$drinks = array();

echo '$n_people';

for($i=0; $i<$n_people; $i++) {
    $sql = "INSERT INTO pruebas1 (Id, Hecho, Entrante, Primer_Plato, Segundo_Plato, Postre, Bebida) VALUES ('', '', '', '$p_plato[$i]', '$s_plato[$i]', '$postre[$i]', '$bebida[$i]')";
    if (mysqli_query($conn, $sql)) {
        echo "La comanda se a enviado correctamente";
        sleep(5);
        header('Index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>