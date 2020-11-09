<?php
// Connection variables
$dbhost	= "65.99.252.199";	   // localhost or IP
$dbuser	= "bibliot8_root";		  // database username
$dbpass	= "Lome5907.";		     // database password
$dbname	= "bibliot8_biblioteca";    // database name
  
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		mysqli_set_charset($conn, "utf-8");
$bdatos = mysqli_select_db($conn,$dbname);

			// Check connection
			if (!$conn) {
					echo "Error de conexion";

  ///////////////////CONSULTA DE LOS LIBROS///////////////////////

$alumnos="SELECT * FROM libro order by id_libro";
$queryLibro= $conexion->query($libro);


?>

<html lang="es">

	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

		<link rel="stylesheet" href="css/estilos.css" rel="stylesheet">
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

		<script>
			
    		$(function(){
				// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
				$("#adicional").on('click', function(){
					$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
				});
			 
				// Evento que selecciona la fila y la elimina 
				$(document).on("click",".eliminar",function(){
					var parent = $(this).parents().get(0);
					$(parent).remove();
				});
			});
		</script>



	</head>

	<body>
		<header>
			<div class="alert alert-info">
			<h2>Insertar Libros a la BD </h2>
			</div>
		</header>

		<section>

				<table class="table">


					<tr class="info">
						<th>ISBN</th>
						<th>TITULO</th>
						<th>NOMBRE AUTOR</th>
						<th>APELLIDO AUTOR</th>
						<th>EDITORIAL</th>
						<th>EDICION</th>
						<th>AÑO</th>
						<th>CIUDAD</th>
						<th>CLASIFICACION</th>

				    </tr>

				  <?php

				  while($registroLibro  = $queryLibros->fetch_array( MYSQLI_BOTH)) 
				  {


				  echo '<tr>
				    	<td>'.$registroLibro['id_libro'].'</td>
				    	<td>'.$registroLibro['titulo'].'</td>
				    	<td>'.$registroLibro['nombre_autor'].'</td>
				    	<td>'.$registroLibro['apellido_autor'].'</td>
				    	<td>'.$registroLibro['editorial'].'</td>
				    	<td>'.$registroLibro['edicion'].'</td>
				    	<td>'.$registroLibro['año'].'</td>
				    	<td>'.$registroLibro['ciudad'].'</td>
				    	<td>'.$registroLibro['id_Dewey'].'</td>
				    </tr>';
				   }

				  ?>


				</table>

			<form method="post">
				<h3 class="bg-primary text-center pad-basic no-btm">Agregar Nuevo Libro </h3>
				<table class="table bg-info"  id="tabla">
					<tr class="fila-fija">
						<td><input required name="id_libro[]" placeholder="ID ISBN"/></td>
						<td><input required name="titulo[]" placeholder="Titulo del Libro"/></td>
						<td><input required name="nombre_autor[]" placeholder="Nombre"/></td>
						<td><input required name="apellido_autor[]" placeholder="Apellido"/></td>
						<td><input required name="editorial[]" placeholder="Editorial"/></td>
						<td><input required name="edicion[]" placeholder="Edición"/></td>
						<td><input required name="año[]" placeholder="Año"/></td>
						<td><input required name="ciudad[]" placeholder="Ciudad"/></td>
						<td><input required name="dewey_clasificacion[]" placeholder="Clasificación"/></td>
						<td class="eliminar"><input type="button"   value="Menos -"/></td>
					</tr>
				</table>

				<div class="btn-der">
					<input type="submit" name="insertar" value="Insertar Alumno" class="btn btn-info"/>
					<button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button>

				</div>
			</form>

			<?php

				//////////////////////// PRESIONAR EL BOTÓN //////////////////////////
				if(isset($_POST['insertar']))

				{


				$items1 = ($_POST['idalumno']);
				$items2 = ($_POST['nombre']);
				$items3 = ($_POST['carrera']);
				$items4 = ($_POST['grupo']);
				$items1 = ($_POST['idalumno']);
				$items2 = ($_POST['nombre']);
				$items3 = ($_POST['carrera']);
				$items4 = ($_POST['grupo']);
				 
				///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
				while(true) {

				    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
				    $item1 = current($items1);
				    $item2 = current($items2);
				    $item3 = current($items3);
				    $item4 = current($items4);
				    
				    ////// ASIGNARLOS A VARIABLES ///////////////////
				    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
				    $nom=(( $item2 !== false) ? $item2 : ", &nbsp;");
				    $carr=(( $item3 !== false) ? $item3 : ", &nbsp;");
				    $gru=(( $item4 !== false) ? $item4 : ", &nbsp;");

				    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
				    $valores='('.$id.',"'.$nom.'","'.$carr.'","'.$gru.'"),';

				    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
				    $valoresQ= substr($valores, 0, -1);
				    
				    ///////// QUERY DE INSERCIÓN ////////////////////////////
				    $sql = "INSERT INTO alumnos (id_alumno, nombre, carrera, grupo) 
					VALUES $valoresQ";

					
					$sqlRes=$conexion->query($sql) or mysql_error();

				    
				    // Up! Next Value
				    $item1 = next( $items1 );
				    $item2 = next( $items2 );
				    $item3 = next( $items3 );
				    $item4 = next( $items4 );
				    
				    // Check terminator
				    if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
    
				}
		
				}

			?>



		</section>

		<footer>
		</footer>
	</body>

</html>


