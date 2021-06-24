<?php

    // Nos conectamos a las bdds
    require("../config/conexion.php");
    include('../templates/header.html');
?>

<?php
$tienda = $_POST['Tienda'];
$lista = explode(":", $tienda);
echo $lista[0];
echo $lista[1];
?>

<form action="comprasp1.php" method="POST">
  <p><input type="hidden" name="infotienda" value="<?php echo $lista[0]; ?>"></p>
  <p><input type="submit" value="Enviar"></p>
</form>