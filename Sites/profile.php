<?php
  session_start();
  require("config/conexion.php");
$id=$_SESSION['rut'];
$query= "SELECT * FROM usuarios where rut='$id'";
$result = $db -> prepare($query);
$result -> execute();
$row= $result -> fetchAll();
$uid = $row[0][0];

$query2 = "SELECT direccion FROM direcciones, direcciones_asociadas WHERE direcciones.did = direcciones_asociadas.did AND direcciones_asociadas.uid = '$uid';";
$result2 = $db -> prepare($query2);
$result2 -> execute();
$row2 = $result2 -> fetchAll();

$query3 = "SELECT * FROM administradores WHERE rut_adm = '$id';";
$result3 = $db -> prepare($query3);
$result3 -> execute();
$row3 = $result3 -> fetchAll();

$query4 = "SELECT idunid, iddir FROM personal, unidades WHERE pid = idjefe AND rut = '$id'; ";
$result4 = $db2 -> prepare($query4);
$result4 -> execute();
$row4 = $result4 -> fetchAll();

  ?>
  <h1>Perfil del Usuario</h1>

  <label>Nombre: <?php echo $row[0][1]; ?></label> <br>
  <label>RUT: <?php echo $row[0][2]; ?></label> <br>
  <label>Sexo: <?php echo $row[0][3]; ?></label> <br>
  <label>Edad: <?php echo $row[0][4]; ?></label> <br>
  <label>Dirección: <?php echo $row2[0][0]; ?></label> <br>

<br>

<h5>¿Quieres cambiar tu contraseña?</h5>
<form  action='cambiar_contraseña.php' method='POST'>
  <label>Contraseña Antigua: </label><br>
  <input type="password" name="old_pass"><br>
  <label>Contraseña Nueva: </label><br>
  <input type="password" name="new_pass"><br>
  <input class='btn' type='submit' value='Cambiar Contraseña'>
</form>

<br>

<h3>Información Relevante.</h3>

<?php if (isset($row4[0][0])) {
  echo 'Usuario es Jefe de una Unidad de Despacho.';
  $idunid = intval($row4[0][0]);
  $iddir = intval($row4[0][1]);
  $query5 = "SELECT * FROM direcciones WHERE iddir = '$iddir'; ";
  $result5 = $db2 -> prepare($query5);
  $result5 -> execute();
  $row5 = $result5 -> fetchAll();

  $query6 = "SELECT personal.rut, nombre, clasificacion FROM administradoresytrabajadores, personal WHERE idunid = '$idunid' AND
  personal.rut = administradoresytrabajadores.rut AND NOT clasificacion = 'administracion'";
  $result6 = $db2 -> prepare($query6);
  $result6 -> execute();
  $administradores = $result6 -> fetchAll();

  ?>
  <br>
  <label>Dirección de la Unidad: <?php echo $row5[0][1]; ?></label> <br>
  <label>Comuna de la Unidad : <?php echo $row5[0][2]; ?></label> <br>

  <h4>Administrativos de esta Unidad:</h4>
  <body>
        <table class='table'>
            <thead>
                <tr>
                <th>RUT</th>
                <th>Nombre</th>
                <th>Cargo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($administradores as $admin) {
                    echo "<tr>";
                    for ($i = 0; $i < 3; $i++) {
                        echo "<td>$admin[$i]</td> ";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </body>
<?php
}
else {
  $query7 = "SELECT compras.cid, pnombre, cantidad, precio, pdescripcion FROM compras, productos_compra, productos WHERE uid = '$uid' AND compras.cid = productos_compra.cid AND productos.pid = productos_compra.pid; ORDER BY compras.cid";
  $result7 = $db -> prepare($query7);
  $result7 -> execute();
  $historial = $result7 -> fetchAll();
  ?>
  <h4>Historial de Compras:</h4>
  <body>
        <table class='table'>
            <thead>
                <tr>
                <th>ID compra</th>
                <th>Nombre Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($historial as $compra) {
                    echo "<tr>";
                    for ($i = 0; $i < 5; $i++) {
                        echo "<td>$compra[$i]</td> ";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </body>
<?php
}
?>

<form method="post" action="index.php?">
  <input type="submit" value="Volver" />
</form>