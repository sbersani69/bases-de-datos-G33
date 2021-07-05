<?php
    session_start();
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

<h3 align="center"> BÚSQUEDA DE PRODUCTOS </h3>

	<form align="center" action="comprasp2.php" method="post">
		Nombre_Producto:
    <input type="text" name="producto_elegido">
    <input type="hidden" name="infotienda" value="<?php echo $lista[0]; ?>">
    <br/>
    <input type="submit" value="Consultar productos vendidos">
  	</form>

<h3 align="center"> COMPRAR PRODUCTO </h3>

    <?php
    $query = "SELECT productos.pid, productos.pnombre FROM productos ORDER BY pid;";
    $result = $db -> prepare($query);
    $result -> execute();
    $productos = $result -> fetchAll();
    $ruti = $_SESSION['rut'];
    $query2 = "SELECT direcciones.did, direcciones.direccion FROM direcciones, direcciones_asociadas, usuarios WHERE direcciones.did = direcciones_asociadas.did AND direcciones_asociadas.uid = usuarios.uid AND usuarios.rut = '$ruti';";
    $result2 = $db -> prepare($query2);
    $result2 -> execute();
    $direccion = $result2 -> fetchAll();
    ?>
    <form align="center" action="procedimiento_compras.php" method="post">
    <select name="Direccion">
    <?php

    foreach ($direccion as $dire){
	echo "<option>{$dire[0]}: {$dire[1]}</option>";
    }
    ?>
    </select><br>
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

   <h3 align="center"> BEST SELLERS </h3>
   <form align="center" action="comprase.php" method="post">
   <p><input type="hidden" name="infotienda" value="<?php echo $lista[0]; ?>"></p>
   <p><input type="submit" value="Productos más vendidos"></p>
   </form>
