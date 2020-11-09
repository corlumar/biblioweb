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



<!-- <link rel="stylesheet" href="css/botones.css"> -->





</head>




<body onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">

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
  <a href="consulta.php" class="w3-button w3-red">Consultar</a>
  
   <a href="prestamos_admin.php" class="w3-button w3-red">Préstamos</a>
   
   <a href="devolucion_admin.php" class="w3-button w3-red">Devoluciones</a>
   
  <a href="insertar_dos_tablas.php" class="w3-button w3-red">Agregar Libro</a>
  
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