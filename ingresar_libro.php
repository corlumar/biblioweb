<?php
require_once 'conecta.php';

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  //echo "conexion exitosa";
?>
<!DOCTYPE html>
<?php
	 
	$id = $_GET['id'];
?>
<html>

	<head>

		<title>Ingresar Libro</title>

		<meta charset="utf-8">

		<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">


	</head>
	
		<link rel="stylesheet" href="css/loginn.css"> 

		<link rel="stylesheet" href="css/mis_estilos.css"> 
		<link rel="stylesheet" href="css/css-tablas.css"> 
		
	 
		<style type="text/css">
		#buscar{
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
		@media screen and (max-width: 320px) {
			table {
			display: block;
			overflow-x: auto;
			}
		}
		.caja_inline {
			display: inline-block;
			width: 100px;
		}
		#content div{ float:left; }
		.clear{
			clear:both;
			}
		</style>

		
	<body>

 	<section>
  	

		<div class="header"><h1>BIBLIOTECA</h1>

			<h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>

		</div>
		<?php
			

				require_once "conecta.php";
				$query = "SELECT l.id_libro, l.titulo, d.disponibilidad, c.id_dewey, a.nombre_autor, a.apellido_autor, a.email_autor FROM libro l 
				WHERE id_users ='$id'" or die ("Error");
				// echo $query;
				$queryLibros = $conn->query("SELECT * FROM libro order by id_libro");
				$queryAutor = $conn->query("SELECT * FROM autor order by id_autor");
				$queryDewey = $conn->query("SELECT * FROM clasificaDewey order by id_dewey");
				$queryDispo = $conn->query("SELECT * FROM disponibilidad order by id_disponibilidad");
			if(isset($_POST['insertar']))
			{
				$queryLibros=$conn->query("SELECT * FROM libro order by id_libro");
				$queryAutor = $conn->query("SELECT * FROM autor order by id_autor");
				$queryDewey = $conn->query("SELECT * FROM clasificaDewey order by id_dewey");
				$queryDispo = $conn->query("SELECT * FROM disponibilidad order by id_disponibilidad");

				$id_libro=$_POST['id_libro'];
				$titulo=$_POST['titulo'];
				$id_autor=$_POST['id_autor'];
				$nombre_autor=$_POST['nombre_autor'];
				$apellido_autor=$_POST['apellido_autor'];
				$email_autor=$_POST['email_autor'];
				$id_dewey=$_POST['id_dewey'];
				$disponibilidad=$_POST['disponibilidad'];
				
				$insertarLibro=$conn->query("INSERT INTO libro VALUES('id_libro', 'titulo','id_autor', 'disponibilidad','id_dewey')");
				if($insertarLibro==true)
				{
					$insertarAutor=$conn->query("INSERT INTO autor VALUES('id_autor', 'nombre_autor','apellido_autor', 'email_autor')");
				}
				if($insertarAutor==true)
				{
					$insertarDewey=$conn->query("INSERT INTO clasificaDewey VALUES('id_dewey', 'dewey_clasificacion')");
				}

				if($insertarDewey==true)
				{
					echo "<center><strong><h3>¡Inserción Exitosa!<br><a href='ingresar_libro.php'>Click para Verificar</a></strong></h3></center>";
				} 
				?>
			}
		<span style=" color: black; text-shadow: black 0.1em 0.1em 0.2em">MATRICULA: <?php echo $clave ?> </span> <span> | </span><span><a  style=" color: white; text-shadow: black 0.1em 0.1em 0.2em; text-decoration:none;" href="cerrar_Sesion.php">Cerrar Sesión</a></span> 
		<br><br>

		<div id="content">
			
			<div>
				<form>
					
					Prestamo de Libros por ISBN:
					<input type="text" id="prestamol" name="prestamol" placeholder="Escriba el ISBN del libro" required/>
					
				</form>

				<button id="buscar" name="buscar">Buscar</button>
			</div>
			<div>
				<form>
					
					Prestamos de Libros por Titulo:
					<input type="text" id="prestamo1" name="prestamol" placeholder="Escriba el titulo del libro" required/>
					
				</form>

				<button id="buscar" name="buscar">Buscar</button>
			</div>
			<div>
				<form>
					
					Prestamos de libros por autor:
					<input type="text" id="prestamol" name="prestamol" placeholder="Escriba la clave del libro" required/>
					
				</form>

				<button id="buscar" name="buscar">Buscar</button>
			</div>
			<div>
				<form>
					
					Prestamos de libros por clave:
					<input type="text" id="prestamol" name="prestamol" placeholder="Escriba la clave del libro" required/>
					
				</form>

				<button id="buscar" name="buscar">Buscar</button>
			</div>
			<div class="clear"></div>
			<div id="prestamo"></div>
		</div>		

	</section>
	
		<!-- <br><br>

		<div class="footer">

			<a href="mailto:contacto@upch.mx">Contactanos</a>

			<a href="https://www.google.com.mx/maps/@17.960151,-93.368929,17.78z?hl=es-419">Carr. Cárdenas - Huimanguillo Km. 2.0.Cárdenas, Tabasco México</a>

			<a href="./">Politicas de Privacidad</a> - <a href="./">Condiciones de Uso</a>

 
			<span><p>Copyright 2020, Universidad Popular de la Chontalpa.</p>Designed by Esteban López Martínez </span>

		</div>	 
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
						return
 					}				 
				});
			}
		
			$(document).on('click', '#buscar', function(){
				var code_book = $("#prestamol").val();	
				cargar_libros(code_book) 
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
-->
</body>

</html>