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

$sql = "SELECT * from requests where Hecho = 1";
if (mysqli_query($conn, $sql)) {
    echo
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>