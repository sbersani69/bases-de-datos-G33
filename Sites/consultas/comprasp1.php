<?php
$id = $_POST['infotienda'];


// Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');

     // Primero obtenemos los 3 productos más baratos comestibles
    $query = "SELECT DISTINCT productos.pid, productos.pnombre, productos.precio FROM tienda_vende, productos WHERE tienda_vende.tid = '$id' AND tienda_vende.pid = productos.pid AND productos.ptipo = 'comestible' ORDER BY productos.precio ASC LIMIT 3;";
    $result = $db -> prepare($query);
    $result -> execute();
    $resultados= $result -> fetchAll();

    // Primero obtenemos los 3 productos más baratos comestibles
    $query2 = "SELECT DISTINCT productos.pid, productos.pnombre, productos.precio FROM tienda_vende, productos WHERE tienda_vende.tid = '$id' AND tienda_vende.pid = productos.pid AND productos.ptipo = 'no comestible' ORDER BY productos.precio ASC LIMIT 3;";
    $result2 = $db -> prepare($query2);
    $result2 -> execute();
    $resultados2 = $result2 -> fetchAll();

?>

<body>
        <div style="text-align:center;">
	        <table class='table' border="1" style="margin: 0 auto;">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nombre del producto comestible</th>
                <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($resultados as $r) {
                    echo "<tr>";
                    for ($i = 0; $i < 4; $i++) {
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
                COMESTIBLES
            </p>
        </footer>
    </body>

<?php
    <form method="post" action="./consultas/pagina_productos.php">
    <select name="Producto">
    <?php

    foreach ($resultados as $R){
	echo "<option>{$R[0]}: {$R[1]}</option>";
    }
    ?>
    </select><br>
    <input type="submit" value="Ver características del producto" />
    </form>
?>

<body>
        <div style="text-align:center;">
	        <table class='table' border="1" style="margin: 0 auto;">
            <thead>
                <tr>
                <th>ID</th>
                <th>Nombre del producto no comestible</th>
                <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($resultados2 as $r2) {
                    echo "<tr>";
                    for ($i = 0; $i < 4; $i++) {
                        echo "<td>$r2[$i]</td> ";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
        <footer>
            <p>
                NO COMESTIBLES
            </p>
        </footer>
    </body>


<?php include('../templates/footer.html'); ?>

</html>