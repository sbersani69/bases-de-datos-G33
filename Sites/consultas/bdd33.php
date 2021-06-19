<?php

    require("../config/conexion.php");
    include('../templates/header.html');

    $query = "SELECT * FROM usuarios ORDER BY uid;";
    $result = $db -> prepare($query);
    $result -> execute();
    $usuarios = $result -> fetchAll();

?>

    <body>  
        <table class='table'>
            <thead>
                <tr>
                <th>uid</th>
                <th>unombre</th>
                <th>rut</th>
                <th>edad</th>
                <th>sexo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $pokemon) {
                    echo "<tr> <td>$pokemon[0]</td> <td>$pokemon[1]</td> <td>$pokemon[2]</td> <td>$pokemon[3]</td> <td>$pokemon[4]</td> </tr>";
                }
                ?>
            </tbody>
        </table>
        <footer>
            <p>
                Prueba bdd33
            </p>
        </footer>

    </body>
</html>