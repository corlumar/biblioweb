<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
  font-family: Arial, Helvetica, sans-serif;
}
.estilo-prueba {
 color: fff;
}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 30px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the content */
.content {
  background-color: #ddd;
  padding: 15px;
  height: 350px; /* Should be removed. Only for demonstration */
  font-size: 20px;
}

/* Style the footer */
.footer {
  background-color: #f1f1f1;
  padding: 15px;
}
</style>
</head>

<div class="header">	
  	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div align="center"> 
				<h1>BIBLIOTECA</h1><h1>UNIVERSIDAD POPULAR DE LA CHONTALPA</h1>
				</div>	
			</div>
		</div>
	</div>
</div>
		<div align="center">
		<h2 style="color:blue;"> Bienvenido: Administrativo<?php echo $_SESSION['nombre'] ?></h2>
		
</div>


<body>

<div class="topnav">
  <a href="index.php">Inicio</a>
  <a href="presentacion.mp4">Presentación</a>
  <a href="servicios.php">Servicios</a>
  <a href="prestamo.php">Préstamo</a>
  <a href="colecciones.php">Colecciones</a>
  <a href="https://upch.mx/#">Bibliotecas</a>
  <a href="https://upch.mx/quienes-somos">Acerca de Nosotros</a>
  <a href="mailto:contacto@upch.mx">Contactanos</a>
</div>


<div class="content">
  <h2><a href="https://upch.mx/quienes-somos">Acerca de Nosotros</a></h2>
  <p>La UPCH surge de un proyecto educativo iniciado por personas del municipio de Cárdenas a principios de 1995, mismo que se decía ser diseñado a la situación actual (falta de recursos) del estado de Tabasco y que los protagonistas eran de la clase marginada, donde todo individuo podría ingresar, no importando raza, partido, religión, solo ganas de transformar su conciencia, inteligencia y sus principios morales.</p>

	<p>Se crea como una universidad municipal sustentada en el artículo 115 de la Ley del municipio libre, logrando para fines de 1998 su registro oficial como institución reconocida por la secretaría de Educación con el decreto 112 publicado en el diario oficial el día 7 de noviembre de 1998.</p>

	<p>A partir de esta fecha empieza una nueva administración. Así mismo se realizó un análisis en los planes y programas de estudios ya existentes para ver si se cumplía con las expectativas y cubrían las necesidades de una institución de nivel superior que satisficiera las necesidades sociales en donde estaba inmersa.</p>
</div>

<div class="footer">
 
  	<a href="mailto:contacto@upch.mx">Contactanos</a>
	<div id="footer1"><a href="https://www.google.com.mx/maps/@17.960151,-93.368929,17.78z?hl=es-419">Carr. Cárdenas - Huimanguillo Km. 2.0.Cárdenas, Tabasco México</a>
	<div id="foot">
		<div id="foot1"><a href="condiciones.html">Politicas de Privacidad</a> - <a href="condiciones.html">Condiciones de Uso</a></div>
		<div id="foot2">
		<span class="valid">Valid <a href="http://validator.w3.org/check?uri=referer">XHTML</a> + <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
		<p></span>Copyright 2020, Universidad Popular de la Chontalpa.</p>Designed by Esteban López Martínez </span></a>

</body>
</div>

</body>
</html>
