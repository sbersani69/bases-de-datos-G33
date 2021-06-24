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

<form action="comprasp1.php" method="POST">
  <p><input type="hidden" name="infotienda" value="<?php echo $lista[0]; ?>"></p>
  <p><input type="submit" value="Enviar"></p>
</form>

  <br>
  <br>

<h3 align="center"> PARTE 2 </h3>

	<form align="center" action="comprasp2.php" method="post">
		Nombre_Producto:
    <input type="text" name="producto_elegido">
    <input type="hidden" name="infotienda" value="<?php echo $lista[0]; ?>">
    <br/>
    <input type="submit" value="Consultar productos vendidos">
  	</form>