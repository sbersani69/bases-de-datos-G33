<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');


    $query = "SELECT Personal.rut FROM Personal;";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $usuarios_administracion = $result -> fetchAll();

    foreach ($usuarios_administracion as $user_administracion){

        // Luego construimos las querys con nuestro procedimiento almacenado para ir agregando esas tuplas a nuestra bdd objetivo

            $query = "SELECT comprobar_rut('$user_administracion[0]'::varchar);";
            $result = $db -> prepare($query);
            $result -> execute();
            $usuarios = $result -> fetchAll();
        }
