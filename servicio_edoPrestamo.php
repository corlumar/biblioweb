<?php
session_start();
if(isset($_SESSION['nombre']))
{

?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Index</title>
    
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   	<link rel="stylesheet" href="css/loginn.css">
  </head>
  <body>
 
  <div class="header">	
  	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div align="center"> 
				<h1>BIBLIOTECA </h1> <h1>UNIVERSIDAD POPULAR DE LA CHONTALPA</h1>
				</div>	
			</div>
		</div>
	</div>
</div>
	
	<div class="row">	
		<div class="col-sm-12 col-md-6 col-lg-8">
		<div align="center">
		<h2 style="color:blue;"> Bienvenido: Alumno <?php echo $_SESSION['nombre'] ?></h2>
		
</div>
				
	</div>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
		<form name="estado" method="POST" action="busqueda_servicio1.php">
		Estado de mis prestamos:<input type="text" name="clave"  placeholder="Escriba su clave" required/>
		<input type="submit" value="Buscar" class="btn btn_search" name="btn1"></form>
		<p></p>

		<form name="no_adeudo" method="POST" action="busqueda_servicio2.php">
		Solicitud de No Adeudo:<input type="text" name="titulo" placeholder="Escriba su clave" required/>
		<input type="submit" value="Buscar" class="btn btn_search" name="btn2"></form>
		<p></p>

		<form name="Prestamos" method="POST" action="busqueda_servicio3.php">
		Prestamo a domicilio:<input type="text" name="autor" placeholder="Escriba el nombre del autor yO libro" required/>
		<input type="submit" value="Buscar" class="btn btn_search" name="btn3"></form>
		<p></p>


				
		</body>
		
		<br/>
		<br/>
<br/>
<br/>
	
</div>
<div class="footer">
			<a href="mailto:contacto@upch.mx">Contactanos</a>
	<div id="footer1"><a href="https://www.google.com.mx/maps/@17.960151,-93.368929,17.78z?hl=es-419">Carr. Cárdenas - Huimanguillo Km. 2.0.Cárdenas, Tabasco México</a>
	<div id="foot">
		<div id="foot1"><a href="./">Politicas de Privacidad</a> - <a href="./">Condiciones de Uso</a></div>foot1
		<div id="foot2">
			<span class="valid">Valid <a href="http://validator.w3.org/check?uri=referer">XHTML</a> + <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
				<p></span>Copyright 2020, Universidad Popular de la Chontalpa.</p>Designed by Esteban López Martínez </span></a>

 
	</body>
</html>