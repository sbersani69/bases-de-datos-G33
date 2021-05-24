<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

    $query = "SELECT tiendas.tid, tiendas.tnombre, comunas.dcomuna FROM tiendas, despachan_a, comunas WHERE tiendas.tid = despachan_a.tid AND comunas.comunaid = despachan_a.comunaid ORDER BY tiendas.tid ;";
	$result = $db -> prepare($query);
	$result -> execute();
	$tabla = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>tiendas.tid</th>
      <th>tiendas.tnombre</th>
      <th>comunas.dcomuna</th>
    </tr>
  <?php
	foreach ($tabla as $infotablas) {
  		echo "<tr> <td>$infotablas[0]</td> <td>$infotablas[1]</td> <td>$infotablas[2]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
