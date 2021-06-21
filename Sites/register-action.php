<?php require("config/conexion.php");?>


<?php
if (isset($_POST['rut'])) {
$username = $_POST['name'];
$rut = $_POST['rut'];
$edad = $_POST['edad'];
$sexo = $_POST['sex'];
$password = $_POST['password'];

$register = $db->query("INSERT INTO usuarios (unombre, rut, edad, sexo, contrasena) VALUES ('$username', '$rut', '$edad', '$sexo', '". md5($password)."')");
if ($register) {
header("Location: registration.php?register_action=success");
}
}
?>
