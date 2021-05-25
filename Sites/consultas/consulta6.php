<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $var = $_POST["tipo"];

    if ($var == "no") {
    $query = "SELECT tiendas.tid, tiendas.tnombre, SUM(T.Cantidad)
              FROM (
	                SELECT productos.pid as ide, COUNT(productos_compra.cantidad) as Cantidad
	                FROM productos_compra, productos, compras
	                WHERE productos.pid = productos_compra.pid AND compras.cid = productos_compra.cid AND productos.ptipo = 'no comestible'
	                GROUP BY productos.pid
	                ) as T, tiendas, tienda_vende
              WHERE T.ide = tienda_vende.pid AND tienda_vende.tid = tiendas.tid
              GROUP BY tiendas.tid
              FETCH FIRST 10 ROWS ONLY;";
    } elseif ($var == "comestible") {
    $query = "SELECT tiendas.tid, tiendas.tnombre, SUM(T.Cantidad)
              FROM (
	                SELECT productos.pid as ide, COUNT(productos_compra.cantidad) as Cantidad
	                FROM productos_compra, productos, compras
	                WHERE productos.pid = productos_compra.pid AND compras.cid = productos_compra.cid AND productos.ptipo = 'comestible'
	                GROUP BY productos.pid
	                ) as T, tiendas, tienda_vende
              WHERE T.ide = tienda_vende.pid AND tienda_vende.tid = tiendas.tid
              GROUP BY tiendas.tid
              FETCH FIRST 10 ROWS ONLY;";
    } else {
    $query = "SELECT tiendas.tid FROM tiendas;";
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