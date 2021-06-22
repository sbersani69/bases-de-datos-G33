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
    ?>
    <form method="post" action="./consultas/info_tiendas.php">
    <select name="Tienda">
    <?php

    foreach ($tiendas as $tienda){
    $variable = '$tienda[0]:$tienda[1]'
	echo "<option>{$variable}</option>";
    }

    ?>
    </select><br>
    <input type="submit" value="Seleccionar" />
    </form>

</body>
