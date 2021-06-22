<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');

     // Primero obtenemos todos el personal administrativo que queremos agregar
    $query = "SELECT Personal.nombre, AdministradoresYTrabajadores.rut, Personal.edad, Personal.sexo, Unidades.iddir  FROM AdministradoresYTrabajadores, Personal, Unidades WHERE Personal.rut = AdministradoresYTrabajadores.rut AND AdministradoresYTrabajadores.clasificacion = 'administracion' AND Unidades.idunid = AdministradoresYTrabajadores.idunid;";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $usuarios_administracion = $result -> fetchAll();

     foreach ($usuarios_administracion as $user_administracion){

        // Luego construimos las querys con nuestro procedimiento almacenado para ir agregando esas tuplas a nuestra bdd objetivo

            $query = "SELECT agregar_personal('$user_administracion[0]'::varchar,'$user_administracion[1]'::varchar,$user_administracion[2],'$user_administracion[3]'::varchar, $user_administracion[4]);";
            $result = $db -> prepare($query);
            $result -> execute();
            $usuarios = $result -> fetchAll();
        }

     // Asignaremos contraseñas a los usuarios
    $queryp = "SELECT * FROM usuarios;";
    $resultp = $db -> prepare($queryp);
    $resultp -> execute();
    $usuariosp = $resultp -> fetchAll();

    foreach ($usuariosp as $user){
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $password = "";
        for($i=0;$i<4;$i++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
            $password .= substr($str,rand(0,62),1);
            }
        $queryuser = "SELECT contras($user[0],'$user[1]'::varchar,'$user[2]'::varchar, $user[3], '$user[4]'::varchar,'$password'::varchar);";
        $resultado = $db -> prepare($queryuser);
        $resultado -> execute();
        $usuarios = $result -> fetchAll();
    }

    // Mostrar como queda
    $queryy = "SELECT * FROM usuarios ORDER BY uid;";
    $resulty = $db -> prepare($queryy);
    $resulty -> execute();
    $usuariosy = $resulty -> fetchAll();
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
                <th>contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuariosy as $user) {
                    echo "<tr>";
                    for ($i = 0; $i < 6; $i++) {
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