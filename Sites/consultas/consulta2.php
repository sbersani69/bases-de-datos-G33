<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$Nombre_Comuna = $_POST["comuna_elegida"];
 	$query = "SELECT personal.nid, personal.nombre FROM tiendas, personal, direcciones, comunas WHERE tiendas.nid = personal.nid AND personal.tid = tiendas.tid AND tiendas.did = direcciones.did AND direcciones.comunaid = comunas.comunaid AND LOWER(comunas.dcomuna) LIKE LOWER('%$Nombre_Comuna%');";
	$result = $db -> prepare($query);
	$result -> execute();
	$tabla = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th> personal.nid </th>
      <th> personal.nombre </th>
    </tr>
  <?php
	foreach ($tabla as $informacion) {
  		echo "<tr> <td>$informacion[0]</td> <td>$informacion[1]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>