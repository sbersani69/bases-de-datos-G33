<?php include('templates/header.html');   ?>

<body>
<h3>Ver base de datos 1</h3>
    <form  action='./consultas/bdd33.php' method='GET'>
        <input class='btn' type='submit' value='Consultar'>
    </form>
    
  <h1 align="center"> ENTREGA 2 </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre Mi Tienda Web.</p>

  <br>

  <h3 align="center"> Consulta1 </h3>
  <p style="text-align:center;">Se va a mostrar el nombre de todas las tiendas, junto con los nombres de las comunas a cuales realizan despachos.</p>

  <form align="center" action="consultas/consulta1.php" method="post">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> Consulta 2 </h3>
  <p style="text-align:center;"> Ingrese una comuna. Se van a mostrar todos los jefes de tiendas ubicadas en dicha comuna.</p>
  <form align="center" action="consultas/consulta2.php" method="post">
    Nombre_Comuna:
    <input type="text" name="comuna_elegida">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

   <h3 align="center"> Consulta 3 </h3>
   <p style="text-align:center;"> Seleccione un tipo de producto. Se van a mostrar todas las tiendas que venden al menos un producto de dicha categoría. </p>

   <?php
    #Primero obtenemos todos los tipos de productos
    require("config/conexion.php");
    $result = $db -> prepare("SELECT DISTINCT productos.ptipo FROM productos UNION SELECT DISTINCT comestibles.categoria FROM comestibles;");
    $result -> execute();
    $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta3.php" method="post">
  Seleccinar un tipo:
    <select name="tipo">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por tipo">
  </form>

  <br>
  <br>
  <br>

   <h3 align="center"> Consulta 4 </h3>
   <p style="text-align:center;">  Ingrese una descripción. Se van a mostrar todos los usuarios qué compraron el producto con esa descripción .</p>

   <form align="center" action="consultas/consulta4.php" method="post">
    Descripcion:
    <input type="text" name="descripcion_ingresada">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> Consulta 5 </h3>
  <p style="text-align:center;"> Ingrese el nombre de una comuna. Se va a mostrar la edad promedio de los trabajadores de tiendas en esa comuna </p>

  <form align="center" action="consultas/consulta5.php" method="post">
    Nombre_Comuna:
    <input type="text" name="comuna_elegida">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>

  <br>
  <br>
  <br>

<h3 align="center"> Consulta 6 </h3>
   <p style="text-align:center;"> Seleccione un tipo de producto. Se van a mostrar las tiendas qué han registrado la venta de la mayor cantidad de productos del tipo seleccionado. </p>

   <?php
    #Primero obtenemos todos los tipos de productos
    require("config/conexion.php");
    $result = $db -> prepare("SELECT DISTINCT productos.ptipo FROM productos UNION SELECT DISTINCT comestibles.categoria FROM comestibles;");
    $result -> execute();
    $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta6.php" method="post">
  Seleccinar un tipo:
    <select name="tipo">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por tipo">
  </form>

  <br>
  <br>
  <br>