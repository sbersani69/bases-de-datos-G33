<?php
  require("config/conexion.php");
  session_start();
$id=$_SESSION['rut'];
$query= "SELECT * FROM usuarios where rut='$id'";
$result = $db -> prepare($query);
$result -> execute();
$row= $result -> fetchAll();
  ?>
  <h1>Perfil del Usuario</h1>

  <label>Nombre: <?php echo $row[0][1]; ?></label> <br>
  <label>RUT: <?php echo $row[0][2]; ?></label> <br>
  <label>Sexo: <?php echo $row[0][3]; ?></label> <br>
  <label>Edad: <?php echo $row[0][4]; ?></label> <br>

<div class="profile-input-field">
        <h3>Actualizar Información</h3>
        <form method="post" action="#" >
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" name="name" style="width:20em;" placeholder="Enter your Fullname" value="<?php echo $row['unombre']; ?>" required />
          </div>
          <div class="form-group">
            <label>Sexo</label>
            <input type="text" class="form-control" name="sex" style="width:20em;" placeholder="Enter your Gender" required value="<?php echo $row['sexo']; ?>" />
          </div>
          <div class="form-group">
            <label>Edad</label>
            <input type="number" class="form-control" name="age" style="width:20em;" placeholder="Enter your Age" value="<?php echo $row['edad']; ?>">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
            <center>
             <a href="logout.php">Log out</a>
           </center>
          </div>
        </form>
      </div>
      </html>
      <?php
      if(isset($_POST['submit'])){
        $nombre = $_POST['name'];
        $gender = $_POST['sex'];
        $age = $_POST['age'];
      $result = $db -> query("UPDATE usuarios SET unombre = '$nombre', rut = '$rut'
                      sexo = '$gender', age = $age
                      WHERE rut = '$id';");
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "index.php";
        </script>
        <?php
             }              
?>