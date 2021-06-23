<?php
  session_start();
  require("config/conexion.php");
$id=$_SESSION['rut'];

$old_pass = $_POST['old_pass']
$new_pass = $_POST['new_pass']

echo $old_pass;
echo $new_pass;
?>