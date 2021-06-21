<?php include('../templates/header.html');
require("../config/conexion.php");

session_start();
if (isset($_POST['name'])) {
$username = $_POST['name'];
$password = $_POST['password'];
$login = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '".md5($password)."'");
if ($login->num_rows <= 1) {
$_SESSION['username'] = $username;
header("Location: index.php");
}
}
?>

<?php include('../templates/footer.html'); ?>