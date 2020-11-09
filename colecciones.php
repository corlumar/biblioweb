<?php


session_start();

if(isset($_SESSION['nombre']))

{

$id = $_SESSION['idUsuario']



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Rol_Alumno</title>

<link rel="stylesheet" href="css/loginn.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/mis_estilos.css">

<style>

	ul{
	  text-align: center;
	}

	li{

		text-align: center;

		list-style: none;

		font-family: Arial;

		font-size: 14px;

		background-color: #b23e17;

		border-radius: 5px;

		border: 1px solid #b23e17;
		
		width: 150px;

		padding: 8px;

		display: inline-block;

		margin-top:10px;

	}
	li:hover{
		cursor: pointer;
	}


	ul li a {	

	text-decoration: none;

	color: white;

	/* float: left; */

	}



</style>

</head>



<body>

	<div class="header">	

  	<div class="container">

		<div class="row">

			<div class="col-sm-12">

				<div align="center"> 

				<h1>BIBLIOTECA</h1><h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>

				</div>	

			</div>

		</div>

	</div>

</div>

	 
		<?php include "navigation_bar.php";?>

</div>
 
	<div class="w3-center w3-flat-pumpkin">
<div class="w3-bar">
    <br/>

     	<a href="index.php" class="w3-button w3-red">Inicio</a>

	<a href="presentacion1.php" class="w3-button w3-red">Presentación</a>

	<a href="prestamo1.php?id=<?php echo $id;?>" class="w3-button w3-red">Solicitar Libro</a>

	<a href="mis-prestamos.php?id=<?php echo $id;?>"class="w3-button w3-red">Mis Préstamos</a>

	<a href="colecciones.php" class="w3-button w3-red">Colecciones</a>

    <a href="https://upch.mx/#" class="w3-button w3-red">Bibliotecas</a>

	<a href="https://upch.mx/quienes-somos" class="w3-button w3-red">Acerca de Nosotros</a>
</div>
</div>
</div>	

</head>
<div align="center"> 
<p><h2>COLECCIONES DE LA BIBLIOTECA</h2></p>
</div>

<style>
i { 
    font-size: 25px;
  font-style: italic;
  font-weight:bold;
  text-align: center;
  color: red;
}
</style>
<i>Colección de libros incunables y antiguos:</i>
<p>Conformada por los incunables (Libros impresos desde los comienzos de la imprenta [c. 1450] hasta el fin del año 1500) y los libros Antiguos publicados desde la aparición de la imprenta hasta 1900; las obras colombianas hasta 1930 previa evaluación de Análisis de Información.</p>
<i>Colección audiovisual:</i><p>Todas las obras cuyo formato y contenido están incluidas en la definición dada por la UNESCO y la OMPI. El Sistema de Bibliotecas ingresa a la colección audiovisual los materiales de los formatos: Casetes de audio, Casetes de video, Diapositivas, Discos de acetato, Discos compactos, Juegos, Pruebas de psicología, Mapas (no publicados en formato de libro), Microfichas (reproducción de las tesis), Planos, Rompecabezas, Videodiscos., Blu-ray y videojuegos. </p>
<i>Colección de referencia:</i><p>Compuesta por las obras o fuentes de referencia (Atlas, Bibliografías, Catálogos, Diccionarios, Enciclopedias, Glosarios, Índices, Manuales de Instrucciones, Resúmenes); se ubica en cada una de las salas y bibliotecas según el tema y se intercalan de acuerdo con el orden topográfico en estantería abierta. Las obras de referencia que indizan publicaciones seriadas se ubican en la Hemeroteca, en el orden temático-alfabético que le corresponde en la estantería, si la suscripción está vigente o corresponde a un título de alta consulta.</p>
<i>Colección de reserva:</i><p>Conformada por los libros de texto de consulta obligada para el desarrollo de una asignatura. Cada biblioteca cuenta con la colección de reserva de su área temática, en estantería cerrada para el control de su préstamo, dada su alta circulación. </p>
<i>Colección de tesis:</i><p>Incluye los trabajos presentados como requisito de grado de los estudiantes de los programas académicos del nivel pregrado, maestría y doctorado de la Universidad. Esta colección se encuentra en varios formatos, los ejemplares físicos (en papel, microficha y audiovisual) hacen parte de la colección de la Biblioteca General.</p>
<i>Colección general:</i><p>Distribuida en cada sala o biblioteca según su temática; la colección general comprende: libros, monografías, anuarios, normas, estándares, leyes y las tesis presentadas a instituciones diferentes a la Universidad </p>
<i>Colección hemerográfica:</i><p> Incluye las publicaciones seriadas (revistas), no monográficas. Esta colección se encuentra en cada biblioteca de acuerdo con el tema y físicamente se ubican en estantería abierta, en donde se incorporan los últimos años de las publicaciones con suscripción vigente y en estantería cerrada los títulos suspendidos y los años anteriores. En el caso de las Bibliotecas General, se encuentran en estantería abierta todas las publicaciones de los últimos diez años. Un número considerable de títulos de esta colección cuenta con versión electrónica o está indizada en bases de datos en línea, por esta razón, también se cuenta como colección electrónica y su registro en el catálogo presenta el enlace a la versión electrónica.</p>
<i>Colecciones electrónicas:</i><p> Las anteriores colecciones en sus versiones electrónicas, digitales o digitalizadas con acceso en línea, forman esta colección. Los tipos de colecciones electrónicas son:

Incunables digitalizados, Referencia en línea, Tesis digitales, Bases de datos de publicaciones seriadas y de libros, Publicaciones Seriadas en línea.</p>
<p>Fuente: Universidad de los Andes. (s/f). Tipos de Colecciones. Recuperado el 10 de abril de 2020, de https://biblioteca.uniandes.edu.co/index.php?option=com_content&view=article&id=169:tipos-de-colecciones&catid=18:area-tecnica&lang=es</p>
<p></p>
<p></p>




 <?php include "footer.php";?>

</body>

</html>

<?php

}



else

{

	echo '<script languaje="javascript">window.location="login.html"</script>';

}

?>