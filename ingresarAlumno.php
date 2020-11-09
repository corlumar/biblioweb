<?php
session_start();
?>


<!DOCTYPE html>

<html lang="es">
  <head>
    <title>Ingresar</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   	<link rel="stylesheet" href="css/estilo_ingresar.css">
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
<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">		
					<div class="card">
						<div class="ingresarBox">
							
							<h2>Buscar en el Acervo de la BIBLIOTECA UPCH</h2>

							<form action="" method="post">                           	
								<div class="form-group">									
									<input type="titulo" class="form-control input-lg" name="titulo" placeholder="Titulo" required>        
								</div>							
								<div class="form-group">        
									<input type="autor_nombre" class="form-control input-lg" name="autor_nombre" placeholder="Autor" required>       
								</div>								    
									<input type="submit" class="btn btn-success btn-block" name="buscar" value="Resultado">
							</form>


<?php 
 if(isset($_POST["buscar"]))
 {
 	require("busq_prestamos.php");
 }
?>





	
	
	</div>
	</div>
</div>
 
	</body>
</html>
