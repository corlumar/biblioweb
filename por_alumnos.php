<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');
session_start();
if(!isset($_SESSION['nombre']))
{
    header('Location: loginn.php');
}
?>
<!DOCTYPE html>

<html lang="es">

<head>

	<title>Busqueda Acervo</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	<script languaje="javascript" src="js/jquery.js"></script>
	
    <link rel="stylesheet" href="css/loginn.css"> 

	<link rel="stylesheet" href="css/mis_estilos.css"> 

	<link rel="stylesheet" href="css/botones2.css">  
	
	<script languaje="javascript" src="js/nobackbutton.js"></script>
	
<style>
.dropbtn {
  background-color: #a32020;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

.subnav {
  float: left;
  overflow: hidden;
}

.subnav .subnavbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .subnav:hover .subnavbtn {
  background-color: red;
}

.subnav-content {
  display: none;
  position: absolute;
  left: 0;
  background-color: red;
  width: 100%;
  z-index: 1;
}

.subnav-content a {
  float: left;
  color: white;
  text-decoration: none;
}

.subnav-content a:hover {
  background-color: #eee;
  color: black;
}

.subnav:hover .subnav-content {
  display: block;
}

</style>

</head>

<body>

  <section class="grid-container">  

    <div class="header"><h1>BIBLIOTECA</h1>

      <h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>

    </div>

	<?php include "navigation_bar.php";  ?>	

<div class="w3-center w3-flat-pumpkin">

    <br>
 
<div class="dropdown">
  <button class="dropbtn">Consulta por Alumno</button>
  <div class="dropdown-content">
          <div class=""
    <div align="center">
          
			<form name="clave" method="POST" action="busqueda_alumno11.php">

				Clave del Alumno:<input type="text" name="clave" onfocus="this.value=''" value="Escribe" placeholder="Escriba la clave" required/>

				<input type="submit" value="Buscar" name="btn1">

			</form>
</div>
  </div>
</div>

<div class="dropdown">
 <a href="prestamos_admin.php" class="dropbtn">Préstamos</a>
 </div>

<div class="dropdown">
  <a href="devolucion_admin.php" class="dropbtn">Devoluciones</a>
  </div>

<div class="dropdown">
  <a href="insertar_dos_tablas.php" class="dropbtn">Agregar Libro</a>
 </div>




  <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
 
  
</div>
</div>

	<?php include "footer.php";?>



</body>

</html>