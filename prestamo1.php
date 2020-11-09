<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');
session_start();
$id = $_GET['id'];
if(!isset($_SESSION['nombre']))
{
    header('Location: loginn.php');
}
?>
<!DOCTYPE html>
 
<html>

	<head>

		<title>Prestamos</title>

		<meta charset="utf-8">

		<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">


	</head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/loginn1.css"> 
		<link rel="stylesheet" href="css/mis_estilos.css"> 
		<link rel="stylesheet" href="css/css-tablas.css"> 
		<link rel="stylesheet" href="css/botones.css">  
	 
		<style type="text/css">
		.buscar{
			width: 150px;
			text-decoration: none;
			padding: 10px;
			font-weight:bold;
			font-size: 12px;
			color: #ffffff;
			background-color: #1883ba;
			border-radius: 5px;
			border: 1px solid #0016b0;
			margin-top:12px;			
		}
		.buscar:hover{
			cursor: pointer;
			background: rgba(0,0,0,0.5);
		}
		@media screen and (max-width: 320px) {
			table {
			display: inline-block;
			overflow-x: auto;
			}
		}
	
		.clear{
			clear:both;
			}

			.container{
				text-align:center;
				padding-bottom: 15px;
			}

			.left{
				float: left;
				padding-bottom: 15px;
			 }
			 
			.right{
				float: right;
				padding-bottom: 15px;
			 }
			 
			.center{
 				margin:0 auto; 
				display:inline-block;
				padding-bottom: 15px;
			}
			
			horizontal{
			    display:flex;
			}
			
				.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 70%;
}
		</style>

		
	<body>

 	<section>
  	

		<div class="header"><h1>BIBLIOTECA</h1>

			<h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>

		</div>
		
		
		
		
		<?php
			

				include "conecta.php";
			
				$query = "SELECT * FROM universitario WHERE id_users ='$id'" or die ("Error");
				"INSERT INTO consulta_clave VALUES ($id_libro, $titulo, $disponibilidad, $nombre_autor, $apellido_autor)";
				// echo $query;
				$equery = mysqli_query ($conn, $query);
				$row = mysqli_fetch_array($equery);
				$clave = $row['clave']; 
				?>
		<!-- <div id="barra" style="text-align: right">
		<span style=" color: black; text-shadow: black 0.1em 0.1em 0.2em">MATRICULA: <?php echo $clave ?> 
		</span> <span> | </span><span>
		    
    <a  style=" color: white; text-shadow: black 0.1em 0.1em 0.2em; text-decoration:none;" href="cerrar_Sesion.php">Cerrar Sesión</a></span> 
		</div> -->

	<div id="navigation">
		<p>CLAVE: <?php echo $clave ?> | <a href="cerrar_Sesion.php"> Cerrar Sesión</a> | <a href="javascript:history.back()"> Volver Atrás</a> | <a href="index.php"> Inicio</a></p>

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
		<div class="horizontal">
		<div class="container">
			
			<div class="left">
				<form >
					
					Buscar libros por clave:
					<input type="text" id="prestamol" name="prestamol" placeholder="Escriba la clave del libro" required/>
					
				</form>

				<button id="buscar" name="buscar" class="buscar">Buscar</button>
			</div>
			<div class="center">
				<form>					
					Buscar libros por titulo:
					<input type="text" id="prestamot" name="prestamot" placeholder="Escriba el título del libro" required/>
				</form>

				<button id="buscart" name="buscart" class="buscar">Buscar</button>
			</div>
			<div class="right">
				<form>
					
					Buscar libros por autor:
					<input type="text" id="prestamoa" name="prestamoa" placeholder="Escriba el autor del libro" required/>
					
				</form>

				<button id="buscara" name="buscara" class="buscar">Buscar</button>
			</div>
			<!-- <div class="clear"></div>			 -->
		</div>	
		</div>

	</section>
	<img src="images/upch.jpg" alt="Biblioteca der la UPCH" class="center" width=600 height=300 >
	

	
 		 <div id="prestamo"></div>

		   <?php include "footer.php";?>
		   
		<script
			src="https://code.jquery.com/jquery-3.5.0.js"
			integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
			crossorigin="anonymous"></script>
	
		<script>
		$(document).ready(function(){			
        	// cargar_libros(); 
       		function cargar_libros(codigo){
				var cod = codigo
				$.ajax({
					url: "libros.php",
					method: "POST",   
					data: {cod:cod},           
					success: function (data){
						$('#prestamo').html(data);
						 
 					}				 
				});
			}

			function cargar_librost(codigot){
				var codt = codigot
				$.ajax({
					url: "librost.php",
					method: "POST",   
					data: {codt:codt},           
					success: function (data){
						
						$('#prestamo').html(data);
						
 					}				 
				});
			}

			function cargar_librosa(codigoa){
				var coda = codigoa
				$.ajax({
					url: "librosa.php",
					method: "POST",   
					data: {coda:coda},           
					success: function (data){
						$('#prestamo').html(data);
						 
 					}				 
				});
			}
		
			$(document).on('click', '#buscar', function(){
				var code_book = $("#prestamol").val();	
				cargar_libros(code_book) 
			});

			$(document).on('click', '#buscart', function(){
				// alert ("Buscar Libro Titulo")
				var code_bookt = $("#prestamot").val();	
 				cargar_librost(code_bookt) 
			});

			$(document).on('click', '#buscara', function(){
				var code_booka = $("#prestamoa").val();	
				cargar_librosa(code_booka) 
			});


			$(document).on('click', '.prestalibro', function(){
			var id = $(this).attr("id");  
			var clave = '<?php echo $clave;?>'    
			// alert (id)  
			$("#code_libro").val(id) 
			$("#alumno").val(clave)
        	});
		
		});

		
	</script>
 
</body>

</html>