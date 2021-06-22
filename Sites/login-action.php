<?php 
require("config/conexion.php");

session_start();
if (isset($_POST['rut'])) {
$rut = $_POST['rut'];
$password = $_POST['password'];
$query = "SELECT * FROM usuarios WHERE rut = '$rut' AND password = '".md5($password)."'";
$result = $db -> prepare($query);
$result -> execute();
$inf_usuario = $result -> fetchAll();
if ($inf_usuario->num_rows <= 1) {
$_SESSION_rut = $rut;
$_SESSION_uid = $inf_usuario[0][1];
$_SESSION_nombre = $inf_usuario[0][1];

header("Location: index.php");
}
}
?>

