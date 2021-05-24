<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var = $_POST["tipo"];

    if ($var == "comestible" or $var == "no_comestible") {
    $query = "SELECT DISTINCT tiendas.tid, tiendas.tnombre FROM tiendas, tienda_vende, productos WHERE tienda_vende.tid = tiendas.tid AND tienda_vende.pid = productos.pid AND productos.ptipo LIKE '%$var%';";
    } else {
    $query = "SELECT DISTINCT tiendas.tid, tiendas.tnombre FROM tiendas, comestibles, tienda_vende WHERE tienda_vende.tid = tiendas.tid AND tienda_vende.pid = comestbiles.pid AND comestbiles.categoria LIKE '%$var%';";
    }

  $result = $db -> prepare($query);
  $result -> execute();
  $tabla = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>tiendas.tid</th>
      <th>tiendas.tnombre</th>
    </tr>
  <?php
  foreach ($tabla as $informacion) {
    echo "<tr> <td>$informacion[0]</td> <td>$informacion[1]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>