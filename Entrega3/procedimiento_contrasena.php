<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');

    $query = "SELECT * FROM usuarios ORDER BY uid;";
    $result = $db -> prepare($query);
    $result -> execute();
    $usuarios = $result -> fetchAll();

    foreach ($usuarios as $user){

        $query = "SELECT contrasena1($user[0], '$user[1]'::varchar,'$user[2]'::varchar,$user[3],'$user[4]' ::varchar, $user[5]);";

        $result = $db -> prepare($query);
        $result -> execute();
        $result -> fetchAll();
    }

    $query = "SELECT * FROM usuarios ORDER BY uid DESC;";
    $result = $db -> prepare($query);
    $result -> execute();
    $usuarios = $result -> fetchAll();

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
                <th>did</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $informacion) {
                echo "<tr> <td>$informacion[0]</td> <td>$informacion[1]</td> <td>$informacion[2]</td> <td>$informacion[3]</td> <td>$informacion[4]</td> <td>$informacion[5]</td> </tr>";
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
</html>