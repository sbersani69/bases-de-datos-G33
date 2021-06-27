
    <?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');
    ?>
    <?php
    $producto = $_POST['Producto'];
    $lista = explode(":", $producto);
    echo $lista[0];
    echo $lista[1];
    $id = $_POST['infotienda'];
    // Enviamos del post la informacion a la query con nuestro procedimiento almacenado que realizará
    // las verificaciones correspondientes
    $query = "SELECT verificar_tiendaproducto('$lista[0]', '$id');";
    $result = $db -> prepare($query);
    $result -> execute();


    // Si nos interesa acceder a los booleanos que retorna el procedimiento, debemos hacer fetch de los resultados
    $resultados = $result -> fetchAll();
    print "Esto es {$resultados} !";
    ?>
