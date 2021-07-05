<?php
$id = $_POST['infotienda'];


// Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');

     // Primero obtenemos los 3 productos más baratos comestibles
    $query = "SELECT productos.pid, productos.pnombre, productos.precio, SUM(productos_compra.cantidad) as Cantidad FROM productos_compra, productos, compras WHERE productos.pid = productos_compra.pid AND compras.tid = '$id' AND compras.cid = productos_compra.cid GROUP BY productos.pid ORDER BY Cantidad DESC FETCH FIRST 5 ROWS ONLY;";
    $result = $db -> prepare($query);
    $result -> execute();
    $resultados= $result -> fetchAll();

?>

<body>
        <div style="text-align:center;">
	        <table class='table' border="1" style="margin: 0 auto;">
            <thead>
                <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>PRECIO</th>
                <th>CANTIDAD VENDIDA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($resultados as $r) {
                    echo "<tr>";
                    for ($i = 0; $i < 5; $i++) {
                        echo "<td>$r[$i]</td> ";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
        <footer>
            <p>
                PRODUCTOS VENDIDOS
            </p>
        </footer>
    </body>

    <form method="post" action="pagina_productos.php">
    <select name="Producto">
    <?php

    foreach ($resultados as $R){
	echo "<option>{$R[0]}: {$R[1]}</option>";
    }
    ?>
    </select><br>
    <input type="submit" value="Ver características del producto" />
    </form>

<?php include('../templates/footer.html'); ?>

</html>