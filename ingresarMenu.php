<?php
session_start();
?>


<!DOCTYPE html>

<html lang="es">
  <head>
    <title>Ingresar</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   	<link rel="stylesheet" href="css/ingresarMenu.css">
  </head>


  <body>
 
  <div class="header">	
  	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div align="center"> 
				<h1>BIBLIOTECA UNIVERSIDAD POPULAR DE LA CHONTALPA</h1>
				</div>	
			</div>
		</div>
	</div>
</div>
<div class="dropholder">
  <p>Select</p>
  <div class="dropdown">
    <p><i class="fa fa-foursquare"></i> Seleccione</p>
  </div>
  <ul class="menu">
    <li><i class="fa fa-thumbs-down"></i> Inicio</li>
    <li><i class="fa fa-thumbs-up"></i> Buscar</li>
    <li><i class="fa fa-bolt"></i> Servicios</li>
    <li><i class="fa fa-star"></i> Contactanos</li>
    <li><i class="fa fa-heart"></i> Acerca de Nosotros</li>
  </ul>
</div>



<?php 
 if(isset($_POST["buscar"]))
 {
 	require("busqueda.php");
 }
?>





	
	
	</div>
	</div>
</div>
 
	</body>
</html>
