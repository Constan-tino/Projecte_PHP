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

$n_people = $_POST['Diners'];
$mesa = $_POST['Mesa'];
$entrante = array();
$f_dish = array();
$s_dish = array();
$dessert = array();
$drinks = array();

for($i=1; $i<=$n_people; $i++){
    array_push($entrante, $_POST["Entrante$i"])
}

for($i=1; $i<=$n_people; $i++){
    array_push($f_dish, $_POST["Primer Plato$i"])
}

for($i=1; $i<=$n_people; $i++){
    array_push($s_dish, $_POST["Segundo Plato$i"])
}

for($i=1; $i<=$n_people; $i++){
    array_push($dessert, $_POST["Postre$i"])
}

for($i=1; $i<=$n_people; $i++){
    array_push($drinks, $_POST["Bebida$i"])
}

for($i=0; $i<$n_people; $i++) {
    $sql = "INSERT INTO pruebas1 (Hecho, Entrante, Primer_Plato, Segundo_Plato, Postre, Bebida) VALUES (0, '$entrante[$i]', '$f_dish[$i]', '$s_dish[$i]', '$dessert[$i]', '$drinks[$i]')";
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