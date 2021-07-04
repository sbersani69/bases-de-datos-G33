<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');
?>

<?php
$producto = $_POST['Producto'];
$lista = explode(":", $producto);

$query = "SELECT * FROM productos WHERE pid = '$lista[0]';";
$result = $db -> prepare($query);
$result -> execute();
$row = $result -> fetchAll();
?>
<h3 align="center"> Producto: <?php echo $lista[1]; ?> con id: <?php echo $lista[0];?> </h3>

<label>Precio: <?php echo $row[0][2]; ?></label> <br>
<label>Descripción: <?php echo $row[0][3]; ?></label> <br>
<label>Tipo: <?php echo $row2[0][4]; ?></label> <br>

<?php include('../templates/footer.html'); ?>