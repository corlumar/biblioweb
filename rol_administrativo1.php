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
    <title>Rol_Administrativo</title>

<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	<script languaje="javascript" src="js/jquery.js"></script>
	
    <link rel="stylesheet" href="css/loginn.css"> 

	<link rel="stylesheet" href="css/mis_estilos.css"> 

	<link rel="stylesheet" href="css/botones2.css">  
	
	<script languaje="javascript" src="js/nobackbutton.js"></script>
<!-- <link rel="stylesheet" href="css/botones.css"> -->




</head>


<body>

 	<section class="grid-container">  

    <div class="header"><h1>BIBLIOTECA</h1>

      <h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>

    </div>

	
</div>

<?php include "navigation_bar.php";


?>

<div class="w3-center w3-flat-pumpkin">
<div class="w3-bar">
    <br/>
  
<div class="dropdown">
  <button class="w3-button w3-red">Consultar</button>
  <div class="dropdown-content">
    <a style="font-weight:bold;" href="por_alumno.php">Por Universitario</a>
    <a style="font-weight:bold;"href="por_titulo.php">Por Titulo</a>
    <a style="font-weight:bold;"href="por_autor.php">Por Autor</a>
    <a style="font-weight:bold;"href="por_isbn.php">Por ISBN</a>
  
  </div>
</div>
 

  <a href="insertar_dos_tablas.php" class="w3-button w3-red">Agregar Libro</a>
  
  <a href="agregar_autor.php" class="w3-button w3-red">Nuevo Autor</a>
  
  <a href="agregar_editorial.php" class="w3-button w3-red">Nueva Editorial</a>
  
  <br/><br/>
	<img src="images/upch.jpg" alt="Biblioteca der la UPCH" width=800 height=400>
  
  <br/> <br/> <br/> <br/> <br/>
</div>
</div>
	
	            <script src="https://www.google.com/recaptcha/api.js?render=6Le60MMUAAAAALygcgNXhvSHNPJ3FyNW1mpLB40P"></script>

				 <script>

				grecaptcha.ready(function() {

				grecaptcha.execute('6Le60MMUAAAAALygcgNXhvSHNPJ3FyNW1mpLB40P', {action: 'homepage'}).then(function(token) { })

				};			  		

				</script>
	</div>






</body>

<?php include "footer.php";?>

</html>

<?php

}







?>