<?php
    session_start();
    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');
    ?>
    <?php
    $producto = $_POST['Producto'];
    $lista = explode(":", $producto);
    $direccion = $_POST['Direccion'];
    $lista2 = explode(":", $direccion);
    $id = $_POST['infotienda'];
    // Enviamos del post la informacion a la query con nuestro procedimiento almacenado que realizará
    // las verificaciones correspondientes
    $query = "SELECT verificar_tiendaproducto('$lista[0]', '$id');";
    $result = $db -> prepare($query);
    $result -> execute();

    $vale = "No esta en stock";

    // Si nos interesa acceder a los booleanos que retorna el procedimiento, debemos hacer fetch de los resultados
    $resultados = $result -> fetchAll();
    if($resultados[0][0] == 1){
        $vale = 'Si esta en stock';
        }
    ?>
    <?php
    if ($vale == "No esta en stock") {
        echo "Tienda no vende el producto";
    } else {
        echo "Se sigue con el paso 2";
        $ruti = $_SESSION['rut'];
        $query2 = "SELECT verificar_comunausuario('$lista2[0]', '$id');";
        $result2 = $db -> prepare($query2);
        $result2 -> execute();
        $vale2 = "Compra no puede proceder";
        $resultado2 = $result2 -> fetchAll();
        var_dump($resultado2);
        echo "{$resultado2[0][0]}";
        if($resultado2[0][0] == 1){
            $vale2 = 'Compre se puede';
        }
    }
    ?>
    <?php
    if ($vale2 == "Compra no puede proceder") {
        echo "Tienda no tiene despacho a la direccion del usuario";
    } else {
        echo "Compra puede ser realizada FALTA ACÁ";
        }
    ?>