<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$descripcion = $_POST["descripcion_ingresada"];
    $query = "SELECT DISTINCT usuarios.uid, usuarios.unombre FROM usuarios, compras, productos, productos_compra WHERE usuarios.uid = compras.uid AND productos_compra.cid = compras.cid AND productos_compra.pid = productos.pid AND LOWER(productos.pdescripcion) LIKE LOWER('%$descripcion%');";
	$result = $db -> prepare($query);
	$result -> execute();
	$tabla = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>usuarios.uid</th>
      <th>usuarios.nombre</th>
    </tr>
  <?php
	foreach ($tabla as $informacion) {
  		echo "<tr> <td>$informacion[0]</td> <td>$informacion[1]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
