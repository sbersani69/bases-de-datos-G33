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
        $ruti = $_SESSION['rut'];
        $query2 = "SELECT verificar_comunausuario('$lista2[0]', '$id');";
        $result2 = $db -> prepare($query2);
        $result2 -> execute();
        $resultado2 = $result2 -> fetchAll();
        $vale2 = "Compra no puede proceder";
        if($resultado2[0][0] == 1){
            $vale2 = 'Compra se puede';
        }
    }
    ?>
    <?php
    if ($vale2 == 'Compra no puede proceder') {
        echo "Tienda no tiene despacho a la direccion del usuario";
    } elseif ($vale2 == 'Compra se puede') {
        $ruti = $_SESSION['rut'];
        $queryp = "SELECT usuarios.uid FROM usuarios WHERE usuarios.rut = '$ruti';";
        $resultp = $db -> prepare($queryp);
        $resultp -> execute();
        $resultadop = $resultp -> fetchAll();
        $uid = intval($resultadop[0][0]);
        $query3 = "SELECT compra_a_realizar('$uid', '$id', '$lista2[0]', '$lista[0]');";
        $result3 = $db -> prepare($query3);
        $result3 -> execute();
        $resultado3 = $result3 -> fetchAll();
        echo "Compra exitosa";
    }
    ?>

<?php include('../templates/footer.html'); ?>