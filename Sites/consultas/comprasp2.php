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
        <table class='table' align="center" >
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

<form align="center" action="info_tiendas.php" method="post">
        <p><input type="submit" value="Volver"></p>

</html>