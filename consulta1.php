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


	<link rel="stylesheet" href="css/loginn.css"> 

	<link rel="stylesheet" href="css/mis_estilos.css"> 

	<link rel="stylesheet" href="css/botones1.css">  
	
	<script src="js/nobackbutton.js"></script>

</head>

<body onload="nobackbutton();">

  <section class="grid-container">  

    <div class="header"><h1>BIBLIOTECA</h1>

      <h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>

    </div>

	<?php 


	include "navigation_bar.php";?>	
	<br>
    <section>
		<div align="center">

			<form name="clave" method="POST" action="busqueda_alumno.php">

				Clave del Alumno:<input type="text" name="clave"  placeholder="Escriba la clave" required/>

				<input type="submit" value="Buscar" name="btn1">

			</form>

		</div>

		<br>

		<div align="center">

			<form name="titulo_del_libro" method="POST" action="busqueda_titulo.php">

			Titulo del libro:<input type="text" name="titulo" placeholder="Escriba el titulo del libro" required/>

			<input type="submit" value="Buscar" name="btn2"></form>

		</div>

		<br>

		<div align="center">

			<form name="nombre_del_autor" method="POST" action="busqueda_autor.php">

			Nombre del Autor:<input type="text" name="autor" placeholder="Escriba el nombre del autor" required/>

			<input type="submit" value="Buscar" name="btn3"></form>

		</div>

		<br>

		<div align="center">

			<form name="prestamo" method="POST" action="busqueda_libro.php">

			Prestamos de libros por clave:<input type="text" name="prestamo" placeholder="Escriba la clave del libro" required/>

			<input type="submit" value="Buscar" name="btn5"></form> 
		
		</div>
		<br>

	</section>

	<?php include "footer.php";?>



</body>

</html>