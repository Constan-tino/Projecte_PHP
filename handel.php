<!doctype html>
<html lang="es">

<head>
    <!-- change to utf-8 if you use that -->
    <meta charset="ISO-8859-1">
    <title>Aplicación</title>
    <link rel="stylesheet" href="handel.css">
</head>
<body>
    <form action="subirdatos.php" method="post">
        <?php
                $comensales=$_POST['Comensales']; 
                $mesa=$_POST['mesa']; 
                //echo $comensales; 
            ?>

        <?PHP
        //Nos conectamos con la base de datos
        //echo "<link type='text/css' rel='stylesheet' href='../css/css3.css'>";
        function buscarbasedatos ($string) {
        $servername = "localhost";
        $username = "root";
        $database = "comeahora";
        $password = "";
        $conn = mysqli_connect($servername, $username, $password, $database);


        if (!$conn) {

            die("Connection failed: " . mysqli_connect_error() . "<br>" );

        }

        $sql = "select * from menu where Type='$string'";
        $result= mysqli_query($conn, $sql);
        $chequeo = mysqli_num_rows($result);

        echo "<div>";

        if ($chequeo>0) {
            //echo "<table><tr><th>Nombre</th><th>Tipo</th></tr>";
            echo "<fieldset><legend>$string:</legend>";
            while ($row = mysqli_fetch_assoc($result)){
                //for loop better than this line
                //echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['Type'] . "</td></tr>";
                echo "<div class=\"agrupaciones\"> <input type=\"radio\" name=\"".$row['Type']."\" value=\"".$row['Name']."\" required>" .$row['Name']."</div>";
            }

            //echo "</table></div>";
            echo "</fieldset>";
        } else {

            echo "No hay niguna petición de reserva :( <br>";

        }

        mysqli_close($conn);
        }


        ?>

        <div class="principal">
            <div class="titulo">
                <h1>Mesa <?php echo $mesa; ?></h1>
            </div>
                <p>Aqui va el desplegable con tantos desplegables como comensales son en este caso serian: <?php echo $comensales; ?></p>
                <?php echo buscarbasedatos ("Entrantes"); ?>
                <hr>
                <?php echo buscarbasedatos ("Primer Plato"); ?>
                <hr>
                <?php echo buscarbasedatos ("Segundo Plato"); ?>
                <hr>
                <?php echo buscarbasedatos ("Postre"); ?>
                <!--<fieldset><legend>Entrantes:</legend>
                    <div>
                    <input type="radio" name="mesa" value="$mesa" required>Pan con Aceite.
                    </div>
                </fieldset> -->
                <hr>
                <input class="enviarcomanda" type="submit" value="Enviar comanda" class="boton">
            </div>
    </form>
</body>
</html>

