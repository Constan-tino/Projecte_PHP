<?php
    ini_set('display_errors', 1);
                        error_reporting(E_ALL);
                        session_start();
                        //echo "Session started";
    if (isset($_SESSION['waiter'])) {
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

    <form action="handel.php" method="post">
        <h1 class="titulo">Ordenador de Comandas</h1>
        <hr>
            <div class= "escogermesa">
                    <label for="TABLE">Seleciona la mesa en la que vas a hacer la comanda:</label>
                    <br>
                    <?php 
                        $tables= array(1,2,3,4,5,6,7,8,9,10,11,12,13);
                        foreach($tables as $table) {
                            echo "<input type=\"radio\" name=\"table\" value=\"$table\" required>$table&nbsp;&nbsp;";
                            }
                        
                        echo "&nbsp;&nbsp;";
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
            </div>
    </form>

    <hr>
    
    <?php if ($_SERVER['REQUEST_METHOD']=="POST") {
        echo "<form action=\"subirdatos.php\" method=\"post\">";
        
        //Cogemos la inofrmacion que nos vienen de la pagina anterior mediante el nameS -->
                $diners=$_POST['diners']; 
                $table2=$_POST['table'];  
        
                            //Nos conectamos con la base de datos
                            function searchdatabase ($string, $diners2) {
                            $servername = "bbdd.comeeahora.com";
                            $username = "Tino";
                            $database = "comeahora";
                            $password = "12345678Aa";
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
                                            $solution.="<option>".$row['Name']."</option>\n";
                                        }
                                        echo "$solution</select>";
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
                echo "<h1 class=\"titulo\">Mesa $table2</h1>";
            echo "</div>";
                echo "<hr>"; 
                echo searchdatabase ("Bebida",$diners);
                echo searchdatabase ("Entrantes",$diners);
                echo searchdatabase ("Primer Plato",$diners);
                echo searchdatabase ("Segundo Plato",$diners);
                echo searchdatabase ("Postre",$diners);  
                echo "<hr>";

                echo "<input class='hide' name='Diners' value='$diners'>";
                echo "<input class='hide' name='Mesa' value='$table2'>";
                
                echo "<input class=\"enviarcomanda\" type=\"submit\" value=\"Enviar comanda\" class=\"boton\">";
            echo "</div>";
    
            echo "</form>";
            
        }
echo "</body></html>";
}else {
    header('Location: login.php');
//echo "Logeate";
}
    ?>