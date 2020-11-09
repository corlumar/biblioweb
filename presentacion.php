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
 
	

</head>
<style>
h2 { 
    font-size: 25px;
  font-style: italic;
  font-weight:bold;
  text-align: center;
  color: red;
}
</style>
<p><h2>Presentacion de la BIBLIOTECA</h2></p>



<p>Una cosa que empezamos a usar ahora en las bibliotecas es repensar el diseño. Es algo común y lo que implica salir a conversar con los usuarios. Interactuar activamente con ellos, no sólo pensando en los nuevos servicios que podríamos añadir en la biblioteca. Si no crear una estrategia completamente nueva en función de las nuevas dinámicas de la biblioteca.</p>
<p> Un futuro que podría ser plausible para las bibliotecas es la biblioteca como la “Quinto Poder“. Los medios de comunicación se definen a sí mismos como el cuarto poder del estado porque se ven a sí mismos como quienes controlan los tres poderes principales del estado. Aunque realmente no se les considera creíbles, y a veces están muy cerca del sistema político.</p>
<p>Así Mogens afirma “Lo que las bibliotecas están representando son personas, gente común y corriente en grandes cantidades. De esta manera, la biblioteca puede establecer una nueva forma de control. Las bibliotecas ofrecen lo que la gente necesita; una amplia gama de información, y estamos ayudando a la gente a tener acceso a esa información. Así que, en esa perspectiva, somos el quinto poder del estado.”</p>
<p>Fuente: “Bibliotecas modernas: El paso de una biblioteca transaccional a una biblioteca relacional”. [En línea]. Universo Abierto. Disponible: https://universoabierto.org/2018/03/06/bibliotecas-modernas-pasar-de-una-biblioteca-transaccional-a-una-biblioteca-relacional/. </p>
<p></p>



<div class="footer">

		<a href="mailto:contacto@upch.mx">Contactanos</a>

		<a href="https://www.google.com.mx/maps/@17.960151,-93.368929,17.78z?hl=es-419">Carr. Cárdenas - Huimanguillo Km. 2.0.Cárdenas, Tabasco México</a>

		<a href="./">Politicas de Privacidad</a> - <a href="./">Condiciones de Uso</a>

		<!-- <span class="valid">Valid <a href="http://validator.w3.org/check?uri=referer">XHTML</a> + <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> -->

		<span><p>Copyright 2020, Universidad Popular de la Chontalpa.</p>Designed by Esteban López Martínez </span>

	</div>

</body>

</html>

<?php

}



else

{

	echo '<script languaje="javascript">window.location="login.php"</script>';

}

?>