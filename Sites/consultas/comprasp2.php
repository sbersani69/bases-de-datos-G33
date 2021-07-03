<?php
    $id = $_POST['infotienda'];

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');

    $producto = $_POST["producto_elegido"];

    // CONSULTA
    $query = "SELECT productos.pid, productos.pnombre, productos.ptipo, productos.pdescripcion FROM tienda_vende, productos WHERE tienda_vende.tid = '$id' AND tienda_vende.pid = productos.pid AND productos.pnombre LIKE lower('%$producto%');";
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
                <th>Nombre del Producto</th>
                <th>Tipo de Producto</th>
                <th>Descripción del producto</th>
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
                Búsqueda Producto
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