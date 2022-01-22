<!doctype html>
<html lang="es">

<head>
    <!-- change to utf-8 if you use that -->
    <meta charset="ISO-8859-1">
    <title>Aplicación</title>
    <link rel="stylesheet" href="handel2.css">
</head>
<body>

    <form class= "escogermesa" action="handel.php" method="post">
        <h1 class="titulo">Ordenador de Comandas</h1>
        <hr>
            <label for="MESA">Seleciona la mesa en la que vas a hacer la comanda:</label>
            <br>
            <?php 
                $mesas= array(1,2,3,4,5,6,7,8,9,10,11,12,13);
                foreach($mesas as $mesa) {
                    echo "<input type=\"radio\" name=\"mesa\" value=\"$mesa\" required>$mesa";
                    }   
            ?>
            <label >Numero de Comensales:</label>
                <select  name="diners" >
                    <?php
                        for ($i=1;$i<=10;$i++) {
                            echo "<option>$i</option>\n";
                        }
                    ?>
                    </select>
                <input type="submit" value="Siguiente >" class="boton">
    </form>

    <hr>
    
    <?php if ($_SERVER['REQUEST_METHOD']=="POST") {
        echo "<form action=\"subirdatos.php\" method=\"post\">";
        
        //Cogemos la inofrmacion que nos vienen de la pagina anterior mediante el nameS -->
                $diners=$_POST['diners']; 
                $mesa=$_POST['mesa'];  
        
                //Nos conectamos con la base de datos
        //echo "<link type='text/css' rel='stylesheet' href='../css/css3.css'>";
                            function searchdatabase ($string, $diners2) {
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
                                for ($i=1;$i<=$diners2;$i++) {
                                
                                        echo "<select class=\"select-css\"  name=\"$string$i\" >";
                                        echo "<option>--Selecciona--</option>\n";
                                        while ($row = mysqli_fetch_assoc($result)){
                                            //for loop better than this line
                                            //echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['Type'] . "</td></tr>";
                                            $solucion.="<option>".$row['Name']."</option>\n";
                                        }
                                        echo "$solucion</select>";
                                }
                                        //echo "</table></div>";
                                        echo "</fieldset><br>";
                            } else {

                                echo "No hay niguna petición de reserva :( <br>";
                            }

                            mysqli_close($conn);
                            }

        echo "<div class=\"principal\">";
            echo "<div class=\"titulo\">";
                echo "<h1 class=\"titulo\">Mesa $mesa</h1>";
            echo "</div>";
                echo "<hr>"; 
                echo searchdatabase ("Bebida",$diners);
                echo searchdatabase ("Entrantes",$diners);
                echo searchdatabase ("Primer Plato",$diners);
                echo searchdatabase ("Segundo Plato",$diners);
                echo searchdatabase ("Postre",$diners);  
                echo "<hr>";
                echo "<input class=\"enviarcomanda\" type=\"submit\" value=\"Enviar comanda\" class=\"boton\">";
            echo "</div>";
    
            echo "</form>";

        }
        echo "<input class='hide' name='Diners' value='$diners'>";
        echo "<input class='hide' name='Mesa' value='$mesa'>";
    ?>
</body>
</html>