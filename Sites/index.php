<?php include('templates/header.html');   ?>

<body>
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