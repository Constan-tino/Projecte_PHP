<!doctype html>
<html lang="es">

<head>
    <!-- change to utf-8 if you use that -->
    <meta charset="iso-8859-1">
    <title>Comandas</title>
</head>
<body>
<form action="handel.php" method="post">
    <h1>Ordenador de Comandas</h1>
    <hr>
    <label for="MESA">Seleciona la mesa en la que vas a hacer la comanda:</label>
    <br>
    <?php 
        $mesas= array(1,2,3,4,5,6,7,8,9,10,11,12,13);
        foreach($mesas as $mesa) {
            echo "<input type=\"radio\" name=\"mesa\" value=\"$mesa\" required>$mesa";
        }   
    ?>
    <hr>
    <label >Numero de Comensales:</label>
          <select  name="Comensales" >
            <?php
                for ($i=1;$i<=10;$i++) {
                    echo "<option>$i</option>\n";
                }
            ?>
          </select>
    <hr>
    <input type="submit" value="Siguiente >" class="boton">
</form>
</body>
</html>