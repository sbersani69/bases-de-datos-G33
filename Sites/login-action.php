<?php 
session_start();
require("config/conexion.php");

if (isset($_POST['rut'])) {
$rut = $_POST['rut'];
$password = $_POST['password'];
$query = "SELECT * FROM usuarios WHERE rut = '$rut' AND password = '".md5($password)."'";
$result = $db1 -> prepare($query);
$result -> execute();
$usuario = $result -> fetchAll();
if ($password = $usuario[0][5]) {
$_SESSION['rut'] = $rut;
header("Location: index.php");
}
else {
header("Location: index.php");
}
}
?>

