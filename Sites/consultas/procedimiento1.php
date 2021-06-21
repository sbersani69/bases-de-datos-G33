<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');

     // Primero obtenemos todos el personal administrativo que queremos agregar
    $query = "SELECT Personal.nombre, AdministradoresYTrabajadores.rut, Personal.edad, Personal.sexo FROM AdministradoresYTrabajadores, Personal WHERE Personal.rut = AdministradoresYTrabajadores.rut AND AdministradoresYTrabajadores.clasificacion = 'administracion';";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $usuarios_administracion = $result -> fetchAll();

     foreach ($usuarios_administracion as $user_administracion){

        // Luego construimos las querys con nuestro procedimiento almacenado para ir agregando esas tuplas a nuestra bdd objetivo

            $query = "SELECT agregar_personal('$user_administracion[0]'::varchar,'$user_administracion[1]'::varchar,$user_administracion[2],'$user_administracion[3]'::varchar);";
            echo "Hola mundo";


            $result = $db -> prepare($query);
            $result -> execute();
            $usuarios = $result -> fetchAll();
        }

     // Mostramos los cambios en una nueva tabla
    $queryp = "SELECT * FROM usuarios ORDER BY uid DESC;";
    $resultp = $db -> prepare($queryp);
    $resultp -> execute();
    $usuariosp = $resultp -> fetchAll();


?>

    <body>
        <table class='table'>
            <thead>
                <tr>
                <th>uid</th>
                <th>nombre</th>
                <th>rut</th>
                <th>edad</th>
                <th>sexo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuariosp as $user) {
                    echo "<tr>";
                    for ($i = 0; $i < 5; $i++) {
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