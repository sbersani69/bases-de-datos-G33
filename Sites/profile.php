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

$query3 = "SELECT * FROM administradores WHERE rut_adm = '$uid';";
$result3 = $db -> prepare($query3);
$result3 -> execute();
$row3 = $result3 -> fetchAll();

  ?>
  <h1>Perfil del Usuario</h1>

  <label>Nombre: <?php echo $row[0][1]; ?></label> <br>
  <label>RUT: <?php echo $row[0][2]; ?></label> <br>
  <label>Sexo: <?php echo $row[0][3]; ?></label> <br>
  <label>Edad: <?php echo $row[0][4]; ?></label> <br>
  <label>Dirección: <?php echo $row2[0][0]; ?></label> <br>

<br>
<br>
<br>

<h5>¿Quieres cambiar tu contraseña?</h5>
<form  action='cambiar_contraseña.php' method='POST'>
  <label>Contraseña antigua: </label><br>
  <input type="password" name="old_pass"><br>
  <label>Contraseña Nueva: </label><br>
  <input type="password" name="new_pass"><br>
  <input class='btn' type='submit' value='Cambiar Contraseña'>
</form>

<br>
<br>
<br>

<h3>Información Relevante.</h3>

<?php if (isset($row3[0][0])) {
  echo 'Usuario es ADMIN.';
}
else {
  echo 'Usuario no es Admin.';
}
?>

<form method="post" action="index.php?">
  <input type="submit" value="Volver" />
</form>