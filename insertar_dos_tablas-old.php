<?php

require_once 'conecta.php';

/////////// INSERTAR REGISTRO A LAS TABLAS ///////////////////////

if(isset($_POST['insertar']))// SI SE PRESIONA EL BOTÓN INSERTAR OCURRE LO SIGUIENTE:

{


	$id_libro=$_POST['id_libro'];
	
	$nombre_autor=$_POST['nombre_autor'];

	$apellido_autor=$_POST['apellido_autor'];

	$titulo=$_POST['titulo'];

	$disponibilidad=$_POST['disponibilidad'];

	$edicion=$_POST['edicion'];

	$año=$_POST['año'];

	$editorial=$_POST['editorial'];

	$ciudad=$_POST['ciudad'];

	// SE EJECUTA LA PRIMER INSERCIÓN A LA TABLA libro
	$query= "INSERT INTO libro (id_libro, id_autor, titulo, disponibilidad, id_editorial, edicion, año) VALUES ('$id_libro', $id_autor, '$titulo', $disponibilidad, $editorial, '$edicion', '$año')";
	$insertarUno=$conn->query($query);
	
	if ($insertarUno==true)// SI LA QUERY ANTERIOR SE EJECUTA CON EXITO, SE EJECUTA LA INSERCIÓN A LA TABLA autor

	{

		$insertarDos=$conn->query("INSERT INTO autor VALUES ('$id_autor', '$nombre_autor', '$apellido_autor')");

	}


	if ($insertarDos==true)// SI LA QUERY ANTERIOR SE EJECUTA CON EXITO, SE EJECUTA LA INSERCIÓN A LA TABLA editorial

	{

		$insertarTres=$conn->query("INSERT INTO editorial VALUES ('$id_editorial', '$editorial', '$ciudad')");

	}



	if ($insertarTres==true)// SI LA QUERY ANTERIOR SE EJECUTA CON EXITO, SE EJECUTA LA INSERCIÓN A LA TABLA disponibilidad

	{

		$insertarCuatro=$conn->query("INSERT INTO disponibilidad VALUES ('$id_disponibilidad', '$id_libro', '$disponibilidad')");



		if ($insertarCuatro==true)// SI LA QUERY ANTERIOR SE EJECUTA CON EXITO, SE EJECUTA LA INSERCIÓN A LA TABLA clasificaDewey

		{

			$insertarCinco=$conn->query("INSERT INTO clasificaDewey VALUES ('$id_dewey', '$dewey_clasificacion')");

		}



		if($insertarCinco=true)// MENSAJE DE CONFIRMACIÓN DE INSERCIÓN

		{



			echo "<center><strong><h4>¡INSERCIÓN EXITOSA!<BR><a href='insertar_dos_tablas.php'>CLICK PARA VERIFICAR</a></strong></h4></center>";

		}

	}
}
?>
<link rel="stylesheet" href="css/loginn.css">
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

<html lang="es">

	<head>

		<title>INSERTAR DATOS LIBROS</title>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

		<link rel="stylesheet" href="css/mis_estilos.css" rel="stylesheet">

		<link rel="stylesheet" href="css/css-tablas.css">

	</head>

	<body>

	<br>
		<?php
		 ///////////////////CONSULTA DE VARIAS TABLAS///////////////////////

			$queryLibros = $conn->query("SELECT * FROM libro order by id_libro");

			$queryAutor = $conn->query("SELECT * FROM autor order by id_autor");

			$queryEditorial = $conn->query("SELECT * FROM editorial order by id_editorial");

			$queryDewey = $conn->query("SELECT * FROM clasificaDewey order by id_dewey");

			$queryDisponible = $conn->query("SELECT * FROM disponibilidad order by id_disponibilidad");
			?>
	
			<!-- //////////FORMULARIO PARA INSERTAR DATOS//////////// -->
		<section>
			<form method="post" class="form text-center form-inline col-md-12 bg-info" style="padding-bottom: 1%;">

				<h3 style="text-align: center; color:white">INSERTAR NUEVO LIBRO</h3>

				<input name="id_libro" type="text" placeholder="id_libro" class="form-control form-inline">

				<input name="titulo" type="text" placeholder="titulo" class="form-control form-inline">

				
				<select name="nautor" id="nautor" class="select-css">
				<option selected="true" value="" disabled>seleccione Autor</option>
					<?php
					while($registroAutor  = $queryAutor->fetch_array( MYSQLI_BOTH)){ ?>
					<option value="<?php echo $registroAutor['id_autor'];?>"><?php echo $registroAutor['nombre_autor'] . " " .  $registroAutor['apellido_autor'];?></option>
					<?php } ?>
					<option value="nuevo">Nuevo</option>
				</select>
				<br>
				<div id="dAutorNuevo">
					<input name="nombre_autor" type="text" placeholder="nombre_autor" class="form-control form-inline">
					<input name="apellido_autor" type="text" placeholder="apellido_autor" class="form-control form-inline">			
				</div>
				<div id="dAutorexiste">
					<input name="idautor" id="idautor" type="text">
				</div>
				
				<select name="editoriale" id="editoriale" class="select-css">
				<option selected="true" value="" disabled>seleccione Edktorial</option>
					<?php
					while($registroEditorial  = $queryEditorial->fetch_array( MYSQLI_BOTH)){ ?>
					<option value="<?php echo $registroEditorial['id_editorial'];?>"><?php echo $registroEditorial['editorial'];?></option>
					<?php } ?>
					<option value="nueva">Nueva</option>
				</select>

				<div id="editorialNuevo">
					<input name="editorial"  id="editorial" type="text" placeholder="editorial">
				</div>
				<div id="editorialExiste">
					<input name="ideditorial" id="ideditorial" type="text">
				</div>

				
				<input name="edicion" type="text" placeholder="edicion" class="form-control form-inline">

				<input name="año" type="text" placeholder="año" class="form-control form-inline">

				<input name="ciudad" type="text" placeholder="ciudad" class="form-control form-inline">

				<input name="disponibilidad" type="text" placeholder="disponibilidad" class="form-control form-inline">

				<input name="insertar" type="submit" value="Insertar Datos" class="btn btn-info">

			</form>
			
			
		<script
			src="https://code.jquery.com/jquery-3.5.0.js"
			integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
			crossorigin="anonymous">
		</script>

		<script>
				$(document).ready(function(){
					$("#dAutorNuevo").hide()
					$("#dAutorexiste").hide()
					$("#editorialNuevo").hide()
					$("#editorialExiste").hide()
					$(document).on('change', '#nautor', function(){
						var cont = $('select[id=nautor]').val();
						if (cont=='nuevo'){
							$("#dAutorNuevo").show()
							$("#dAutorexiste").hide()
						}else{
							$("#dAutorNuevo").hide()
							$("#idautor").val(cont)
						}
					});

					$(document).on('change', '#editoriale', function(){
						var conted= $('select[id=editoriale]').val();
						if (conted=='nueva'){
							$("#editorialNuevo").show()
							$("#editorialExiste").hide()
						}else{
							$("#editorialNuevo").hide()
							$("#ideditorial").val(conted)
						}
					});
				})
		</script>
		</section>

		<section>	
		
			<!-- ///////////// T A B L A   LIBRO ///////////////////-->

			<div>

				<h3  style="text-align:center">LIBRO</h3>

				<table class="table">

					<tr class="info">

						<th>ISBN</th>

						<th>TITULO</th>

						<th>EDICION</th>

						<th>AÑO</th>

						<th>DISPONIBILIDAD</th>

				    </tr>

				  <?php
				while($registroLibro  = $queryLibros->fetch_array( MYSQLI_BOTH)) 

				  {

				  echo '<tr style="background-color:#FFF;">

				    	<td>'.$registroLibro['id_libro'].'</td>

				    	<td>'.$registroLibro['titulo'].'</td>

				    	<td>'.$registroLibro['edicion'].'</td>

				    	<td>'.$registroLibro['año'].'</td>

				    	<td>'.$registroLibro['disponibilidad'].'</td>

				    </tr>';

				   } 

				  ?>

				</table>

			</div>

			<!-- ///////////// T A B L A   AUTOR ///////////////////-->

			<div>



				<h3  style="text-align:center">AUTOR</h3>

				<table class="table col-md-6">

					<tr class="info">


						<th>ID</th>

						<th>NOMBRE</th>

						<th>APELLIDO</th>

					</tr>



				  <?php

				  while($registroAutor  = $queryAutor->fetch_array( MYSQLI_BOTH)) 

				  {

				  echo '<tr>

				    	<td>'.$registroAutor['id_autor'].'</td>

				    	<td>'.$registroAutor['nombre_autor'].'</td>

				    	<td>'.$registroAutor['apellido_autor'].'</td>

				    	</tr>';

				   }

				  ?>

				</table>

			</div>



				<!-- ///////////// T A B L A   EDITORIAL ///////////////////-->

			<div>



				<h3 style="text-align:center">EDITORIAL</h3>

				<table class="table col-md-6">

					<tr class="info">

						<th>ID EDITORIAL</th>

						<th>EDITORIAL</th>

						<th>CIUDAD</th>

					</tr>



				  <?php

				  while($registroEditorial  = $queryEditorial->fetch_array( MYSQLI_BOTH)) 

				  {

				  echo '<tr>

				    	<td>'.$registroEditorial['id_editorial'].'</td>

				    	<td>'.$registroEditorial['editorial'].'</td>

				    	<td>'.$registroEditorial['ciudad'].'</td>

				    	</tr>';

				   }

				  ?>

				</table>

			</div>



				<!-- ///////////// T A B L A   CLASIFICADEWEY ///////////////////-->

			<div>



				<h3 style="text-align:center">CLASIFICACION</h3>

				<table class="table col-md-6">

					<tr class="info">

					<th>ID</th>

						<th>CLASIFICA</th>						

					</tr>



				  <?php

				  while($registroClasifica  = $queryClasifica->fetch_array( MYSQLI_BOTH)) 

				  {

				  echo '<tr>

				    	<td>'.$registroClasifica['id_dewey'].'</td>

				    	<td>'.$registroClasifica['dewey_clasificacion'].'</td>

				    	

				    	</tr>';

				   }

				  ?>

				</table>

			</div>



				<!-- ///////////// T A B L A   DISPONIBILIDAD ///////////////////-->

			<div>



				<h3 class="text-center">DISPONIBLE</h3>

				<table class="table col-md-6">

					<tr class="info">

						<th>DISPONIBLE</th>

						

					</tr>



				  <?php

				  while($registroDisponible  = $queryDisponible->fetch_array( MYSQLI_BOTH)) 

				  {

				  echo '<tr>

				    	<td>'.$registroDisponible['id_disponibilidad'].'</td>

				    	<td>'.$registroDisponible['disponible'].'</td>

				    	

				    	</tr>';

				   }

				  ?>

				</table>

			</div>
			
		</section>
		
		<?php include "footer.php";?>
	</body>
</html>





