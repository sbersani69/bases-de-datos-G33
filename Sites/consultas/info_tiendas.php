<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');
?>

<?php
$tienda = $_POST['Tienda'];
$lista = explode(":", $tienda);
echo $lista[0];
echo $lista[1];

<form action="procedimiento_compras1.php" method="post">
	 <input type="hidden" name="vienedelform" value="{$lista[0]}" />
	 <input type="submit" value="Productos baratos" />
</form>


?>