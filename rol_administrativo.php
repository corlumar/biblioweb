<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');

session_start();
// echo $_SESSION['idUsuario'];
// exit;
if(isset($_SESSION['nombre']))

{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Rol_Administrador</title>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="css/loginn.css">

<link rel="stylesheet" href="css/mis_estilos.css"> 

<body>

 	<div class="header">	

  	<div class="container">

		<div class="row">

			<div class="col-sm-12">			    

				<div align="center"> 

				<h1>BIBLIOTECA</h1>
				<h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>

				</div>	

			</div>			

		</div>

	</div>

</div>

<?php include "navigation_bar.php";


?>

<div class="w3-center w3-flat-pumpkin">
<div class="w3-bar">
    <br/>	
<ul>


	<div class="topnav">
	<li><a href="index.php">Inicio</a></li>
	<br/>
	<li><a href="servicios.php">Servicios</a></li>
	<br/>
	<li><a href="consulta.html">Consulta</a></li>
	<br/>
	<li><a href="colecciones.php">Colecciones</a></li>
	<br/>
	<li><a href="https://upch.mx/#">Bibliotecas</a></li>
	<br/>
	<li><a href="https://upch.mx/quienes-somos">Acerca de Nosotros</a></li>
	<br/>
	<li><a href="mailto:contacto@upch.mx">Contactanos</a></li>
</ul>
</head>
<div class="footer">
			<a href="mailto:contacto@upch.mx">Contactanos</a>
	<div id="footer1"><a href="https://www.google.com.mx/maps/@17.960151,-93.368929,17.78z?hl=es-419">Carr. Cárdenas - Huimanguillo Km. 2.0.Cárdenas, Tabasco México</a>
	<div id="foot">
		<div id="foot1"><a href="condiciones.html">Politicas de Privacidad</a> - <a href="condiciones.html">Condiciones de Uso</a></div>foot1
		<div id="foot2">
			<span class="valid">Valid <a href="http://validator.w3.org/check?uri=referer">XHTML</a> + <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
				<p></span>Copyright 2020, Universidad Popular de la Chontalpa.</p>Designed by Esteban López Martínez </span></a>

</body>
</html>
<?php
}

else
{
	echo '<script languaje="javascript">window.location="loginn.html"</script>';
}
?>