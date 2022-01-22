<!doctype html>
<html lang="es">

<head>
    <!-- change to utf-8 if you use that -->
    <meta charset="iso-8859-1">
    <title>comebien</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<div class="login">
        <a href="login.php"><button>Iniciar sesión</button></a>
</div>

<h1>Menú del dia:</h1>
<h2>1 Entrante</p>
<h2>1 Bebida</h2>    
<h2>1 Primer Plato</h2>
<h2>1 Segundo Plato</h2>
<h2>1 Postre</h2>
<hr>
<h2>Por Solo 17 Euros</h2>
<br>
    
    <?php 
                function searchdatabase ($typefoot) {
                    $servername = "localhost";
                    $username = "root";
                    $database = "comeahora";
                    $password = "";
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error() . "<br>" );
                        }

                    $sql = "select * from menu where Type='$typefoot'";
                    $result= mysqli_query($conn, $sql);
                    $chequeo = mysqli_num_rows($result);

                    if ($chequeo>0) {
                        echo "<div class=\"menu\">";
                        echo "<h2>$typefoot</h2>";
                        echo "<ul>";
                        $list="";
                            while ($row = mysqli_fetch_assoc($result)){
                                
                                    //for loop better than this line
                                    $list.="<li>".$row['Name']."</li>\n";
                                }
                                echo "$list</ul>";
                                echo "</div>";
                            }
                    mysqli_close($conn);
                }
        
        echo searchdatabase("Entrantes");
        echo searchdatabase("Primer Plato");
        echo searchdatabase("Segundo Plato");
        echo searchdatabase("Postre");
    ?>
</body>
</html>