<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$Nombre_Comuna = $_POST["comuna_elegida"];
	$query = "SELECT ROUND(AVG(personal.edad), 2) FROM personal, tiendas, direcciones, comunas WHERE personal.tid = tiendas.tid AND tiendas.did = direcciones.did AND direcciones.comunaid = comunas.comunaid AND LOWER(comunas.dcomuna) LIKE LOWER('%$Nombre_Comuna%');";
	$result = $db -> prepare($query);
	$result -> execute();
	$tabla = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th> Promedio de Edad </th>
    </tr>
  <?php
	foreach ($tabla as $informacion) {
  		echo "<tr> <td>$informacion[0]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>