<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Login y Registración</h1>

  <?php
  if (!isset($_SESSION['name'])) { ?>
  <h5>Login</h5>
  <form method="post" action="login-action.php">
  <label>Nombre:</label><br>
  <input type="text" name="name" /><br>
  <label>Password:</label><br>
  <input type="password" name="password" /><br>
  <input type="submit" value="Login" />
  </form>
  Not a member yet? Click <a href="registration.php">here</a> to register.
  <?php } else if (isset($_SESSION['username'])) { ?>
  <?php echo $_SESSION['username'] ?> | <a href="logout.php">Logout</a>
  <?php }
  ?>

  <br>
<h3>Ver procedimiento 1</h3>
    <form  action='./consultas/procedimiento1.php' method='GET'>
        <input class='btn' type='submit' value='Consultar'>
    </form>
</body>

<br>
<br>
<br>