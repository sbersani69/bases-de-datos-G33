<?php
  session_start();
  require("config/conexion.php");
$id=$_SESSION['rut'];
$query= "SELECT contraseña FROM usuarios where rut='$id'";
$result = $db -> prepare($query);
$result -> execute();
$row= $result -> fetchAll();

$old_pass = $_POST['old_pass'];
$new_pass = $_POST['new_pass'];
echo $row[0][0];

if ($old_pass = $row[0][0]){
  echo 'Iniciando cambio de contraseña.';
  $query2 = "UPDATE usuarios SET contraseña = '$new_pass' WHERE rut = $id;";
  $change = $db -> prepare($query2);
  $change -> execute();
  echo 'Contraseña cambiada exitosamente.';
?>
<form method="post" action="index.php?">
  <input type="submit" value="Volver" />
</form>
<?php
} else {
  header("Location: index.php");
}
?>