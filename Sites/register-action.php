<?php require("config/conexion.php");?>


<?php
if (isset($_POST['rut'])) {
$username = $_POST['name'];
$rut = $_POST['rut'];
$edad = $_POST['edad'];
$sexo = $_POST['sex'];
$password = $_POST['password'];

$result = $db -> query("SELECT uid FROM usuarios ORDER BY uid DESC Limit 1");
$ultimo_id = $result -> fetchAll(); 

$register = $db->query("INSERT INTO usuarios (uid, unombre, rut, edad, sexo, contrasena) VALUES ('$ultimo_id[0][0] + 1' ,'$username', '$rut', '$edad', '$sexo', '". md5($password)."')");
if ($register) {
header("Location: registration.php?register_action=success");
}
}
?>
