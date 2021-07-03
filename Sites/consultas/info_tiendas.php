<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');
?>

<?php
$tienda = $_POST['Tienda'];
$lista = explode(":", $tienda);
?>
<h3 align="center"> Tienda: <?php echo $lista[1]; ?> con id: <?php echo $lista[0];?> </h3>
  <form align="center" action="comprasp1.php" method="post">
  <p><input type="hidden" name="infotienda" value="<?php echo $lista[0]; ?>"></p>
  <p><input type="submit" value="Productos más baratos"></p>
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

<h3 align="center"> COMPRAR </h3>

    <?php
    $query = "SELECT productos.pid, productos.pnombre FROM productos ORDER BY pid;";
    $result = $db -> prepare($query);
    $result -> execute();
    $productos = $result -> fetchAll();
    ?>
    <form align="center" action="procedimiento_compras.php" method="post">
    <select name="Producto">
    <?php

    foreach ($productos as $producto){
	echo "<option>{$producto[0]}: {$producto[1]}</option>";
    }

    ?>
    </select><br>
    <input type="hidden" name="infotienda" value="<?php echo $lista[0]; ?>">
    <input type="submit" value="Seleccionar" />
    </form>