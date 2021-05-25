<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var = $_POST["tipo"];

    if ($var == "no") {
    $query = "SELECT tiendas.tid, tiendas.tnombre, SUM(T.Cantidad) as CC
              FROM (
	                SELECT productos.pid, tienda_vende.tid as idetienda, SUM(productos_compra.cantidad) as Cantidad
	                FROM productos_compra, productos, compras, tienda_vende
	                WHERE productos.pid = productos_compra.pid AND compras.cid = productos_compra.cid  AND tienda_vende.pid = productos.pid AND productos.ptipo = 'no comestible'
	                GROUP BY productos.pid, idetienda) as T, tiendas
              WHERE T.idetienda = tiendas.tid
              GROUP BY tiendas.tid
              ORDER BY CC DESC
              FETCH FIRST 10 ROWS ONLY;";
    } elseif ($var == "comestible") {
    $query = "SELECT tiendas.tid, tiendas.tnombre, SUM(T.Cantidad) as CC
              FROM (
	                SELECT productos.pid, tienda_vende.tid as idetienda, SUM(productos_compra.cantidad) as Cantidad
	                FROM productos_compra, productos, compras, tienda_vende
	                WHERE productos.pid = productos_compra.pid AND compras.cid = productos_compra.cid  AND tienda_vende.pid = productos.pid AND productos.ptipo = 'comestible'
	                GROUP BY productos.pid, idetienda) as T, tiendas
              WHERE T.idetienda = tiendas.tid
              GROUP BY tiendas.tid
              ORDER BY CC DESC
              FETCH FIRST 10 ROWS ONLY;";
    } else {
    $query = "SELECT tiendas.tid, tiendas.tnombre, SUM(T.Cantidad) as CC
              FROM (
	                SELECT comestibles.pid, tienda_vende.tid as idetienda, SUM(productos_compra.cantidad) as Cantidad
	                FROM productos_compra, comestibles, compras, tienda_vende
	                WHERE comestibles.pid = productos_compra.pid AND compras.cid = productos_compra.cid  AND tienda_vende.pid = comestibles.pid AND comestibles.categoria = '$var'
	                GROUP BY comestibles.pid, idetienda) as T, tiendas
              WHERE T.idetienda = tiendas.tid
              GROUP BY tiendas.tid
              ORDER BY CC DESC
              FETCH FIRST 10 ROWS ONLY;";
    }

  $result = $db -> prepare($query);
  $result -> execute();
  $tabla = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>tiendas.tid</th>
      <th>tiendas.tnombre</th>
      <th>Cantidad</th>
    </tr>
  <?php
  foreach ($tabla as $informacion) {
    echo "<tr> <td>$informacion[0]</td> <td>$informacion[1]</td> <td>$informacion[2]</td>  </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>