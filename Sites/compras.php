<?php session_start();
include('templates/header.html');
require("config/conexion.php");
?>

<body>
  <h1 align="center">Compras</h1>

    <?php
    $query = "SELECT tiendas.tid, tiendas.tnombre FROM tiendas ORDER BY tid;";
    $result = $db -> prepare($query);
    $result -> execute();
    $tiendas = $result -> fetchAll();
    $a = 0;
    foreach ($tiendas as $tienda){

	    echo "boton '$a': $tienda[1] \n";
	    $a++;
    }
    ?>
    <form method="post" action="./consultas/info_tiendas.php">
    <select name="Tienda">
    <?php

    foreach ($tiendas as $tienda){

	echo "<option>{$tienda[0]}</option>";
    }

    ?>
    </select><br>
    <input type="submit" value="Seleccionar" />
    </form>

</body>
