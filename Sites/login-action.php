<?php 
session_start();
require("config/conexion.php");

if (isset($_POST['rut'])) {
$rut = $_POST['rut'];
$password = $_POST['password'];
$login = $db->query("SELECT * FROM usuarios WHERE rut = '$rut' AND password = '$password'");
if ($login->num_rows = 1) {
$_SESSION['rut'] = $rut;
header("Location: index.php");
}
}
?>

