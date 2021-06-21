<?php 
require("config/conexion.php");

session_start();
if (isset($_POST['rut'])) {
$rut = $_POST['rut'];
$password = $_POST['password'];
$login = $db->query("SELECT * FROM users WHERE rut = '$rut' AND password = '".md5($password)."'");
if ($login->num_rows <= 1) {
$_SESSION['rut'] = $rut;
header("Location: index.php");
}
}
?>

