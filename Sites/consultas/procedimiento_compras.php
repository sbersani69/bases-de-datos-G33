<?php
$producto = $_POST['Producto'];
$lista = explode(":", $producto);
echo $lista[0];
echo $lista[1];
?>
