<?php session_start();
include('templates/header.html');
require("config/conexion.php");
?>

<body>
  <h1 align="center">Compras</h1>

  // Primero obtenemos todos el personal administrativo que queremos agregar
    $query = "SELECT tiendas.tid, tiendas.tnombre FROM tiendas;";
    $result = $db -> prepare($query);
    $result -> execute();
    $tiendas = $result -> fetchAll();
    $a = 0
    foreach ($tiendas as $tienda){

	    echo "boton '$a': $tienda[1]";
	    $a++;
    }

    <form method="post" action="./consultas/info_tiendas.php">
    <select name="Tienda">
    <?php

    foreach ($tiendas as $tienda){

	echo "<option>{$tienda[0]}</option>";
    }

    ?>
    </select><br>
    </form>

</body>
<br>
<br>
<br>