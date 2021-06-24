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
?>

<form action="comprasp1.php">
  <p>Tienda: <input type="hidden" name="{$tienda}"></p>
  <p><input type="submit" value="Enviar"></p>
</form>