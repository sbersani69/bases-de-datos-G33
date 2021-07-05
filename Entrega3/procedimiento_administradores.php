<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');

     // Primero obtenemos todos el personal administrativo que queremos agregar
    $query = "SELECT AdministradoresYTrabajadores.rut  FROM AdministradoresYTrabajadores, Personal WHERE Personal.rut = AdministradoresYTrabajadores.rut AND AdministradoresYTrabajadores.clasificacion = 'administracion';";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $usuarios_administracion = $result -> fetchAll();

     foreach ($usuarios_administracion as $user_administracion){

        // Luego construimos las querys con nuestro procedimiento almacenado para ir agregando esas tuplas a nuestra bdd objetivo

            $query = "SELECT agregar_administrador('$user_administracion[0]'::varchar);";
            $result = $db -> prepare($query);
            $result -> execute();
            $usuarios = $result -> fetchAll();
        }

    // Mostrar como queda
    $queryy = "SELECT * FROM administradores;";
    $resulty = $db -> prepare($queryy);
    $resulty -> execute();
    $usuariosy = $resulty -> fetchAll();
?>
    <body>
        <table class='table'>
            <thead>
                <tr>
                <th>rut_administrador</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuariosy as $user) {
                    echo "<tr>";
                    for ($i = 0; $i < 2; $i++) {
                        echo "<td>$user[$i]</td> ";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <footer>
            <p>
                CONTRASENAS
            </p>
        </footer>
    </body>
<?php include('../templates/footer.html'); ?>

</html>