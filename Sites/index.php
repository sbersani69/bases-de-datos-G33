<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Login y Registración</h1>

  <?php
  echo $_SESSION_rut;
  if (!isset($_SESSION_rut)) { ;?>
  <h5>Login</h5>
  <form method="post" action="login-action.php">
  <label>RUT:</label><br>
  <input type="text" name="rut" /><br>
  <label>Password:</label><br>
  <input type="password" name="password" /><br>
  <input type="submit" value="Login" />
  </form>
  Not a member yet? Click <a href="registration.php">here</a> to register.
  <?php } else if (isset($_SESSION_rut)) { ;?>
  <?php echo $_SESSION_rut ?> | <a href="logout.php">Logout</a>
  <?php };
  ?>

  <?php 
  if (isset($_SESSION_rut)) {;
    echo $_SESSION_rut ?> | <a href="profile.php">Mi Perfil</a>;
  <?php };
  ?>

  <br>
<h3>Ver procedimiento 1</h3>
    <form  action='./consultas/procedimiento1.php' method='GET'>
        <input class='btn' type='submit' value='Consultar'>
    </form>

<br>
<br>
<br>