<?php

    require("../config/conexion.php");
    include('../templates/header.html');

    $query = "SELECT * FROM unidades ORDER BY id;";
    $result = $db2 -> prepare($query);
    $result -> execute();
    $usuarios = $result -> fetchAll();

?>

    <body>  
        <table class='table'>
            <thead>
                <tr>
                <th>idunid</th>
                <th>iddir</th>
                <th>idjefe</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuarios as $pokemon) {
                    echo "<tr> <td>$pokemon[0]</td> <td>$pokemon[1]</td> <td>$pokemon[2]</td> </tr>";
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