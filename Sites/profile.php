<?php
  session_start();
  require("config/conexion.php");
$id=$_SESSION['rut'];
$query= "SELECT * FROM usuarios where rut='$id'";
$result = $db -> prepare($query);
$result -> execute();
$row= $result -> fetchAll();
$uid = $row[0][0];

$query2 = "SELECT direccion FROM direcciones, direcciones_asociadas WHERE direcciones.did = direcciones_asociadas.did AND direcciones_asociadas.uid = '$uid';";
$result2 = $db -> prepare($query2);
$result2 -> execute();
$row2 = $result2 -> fetchAll();

  ?>
  <h1>Perfil del Usuario</h1>

  <label>Nombre: <?php echo $row[0][1]; ?></label> <br>
  <label>RUT: <?php echo $row[0][2]; ?></label> <br>
  <label>Sexo: <?php echo $row[0][3]; ?></label> <br>
  <label>Edad: <?php echo $row[0][4]; ?></label> <br>
  <label>Dirección: <?php echo $row2[0][0]; ?></label> <br>

<form  action='cambiar_contraseña.php' method='GET'>
  <input class='btn' type='submit' value='Cambiar Contraseña'>
</form>