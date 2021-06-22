<?php 
require("config/conexion.php");

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
</head>
<body>
<?php
$rut_prueba=$_SESSION['rut'];
if (!isset($rut_prueba)) { ?>
<h5>Registration</h5>
<?php
if (isset($_GET['register_action'])) {
if ($_GET['register_action'] == "success") { ?>
Successfully Registered!
<?php }
}
?>
<form method="post" action="register-action.php">
<label>Nombre:</label><br>
<input type="text" name="name" /><br>
<label>RUT:</label><br>
<input type="text" name="rut" /><br>
<label>Edad:</label><br>
<input type="text" name="edad" /><br>
<label>Sexo:</label><br>
<select name="sex">
    <?php

    $hombre = Hombre;
    $mujer = Mujer;
	
	echo "<option>{$hombre}</option>";
	echo "<option>{$mujer}</option>";
              
    ?>
</select><br>
<label>Password:</label><br>
<input type="password" name="password" /><br>
<input type="submit" value="Register" />
</form>
Already a member? Click <a href="index.php">here</a> to login.
<?php } else { ?>
You already logged in. Click <a href="logout.php">here</a> to logout.
<?php
}
?>

</body>
</html>