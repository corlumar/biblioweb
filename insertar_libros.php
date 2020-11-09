<?php

require_once 'conecta.php';



  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

 echo "conexiones exitosa";

 

 ///////////////////CONSULTA DE VARIAS TABLAS///////////////////////

$queryLibro = $conn->query("SELECT * FROM libro order by id_libro");

$queryAutor = $conn->query("SELECT * FROM autor order by id_autor");

$queryEditorial = $conn->query("SELECT * FROM editorial order by id_editorial");

$queryDewey = $conn->query("SELECT * FROM clasificaDewey order by id_dewey");

$queryDisponible = $conn->query("SELECT * FROM disponibilidad order by id_disponibilidad");







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

	$insertarUno=$conn->query("INSERT INTO libro VALUES ('$id_libro', '$id_autor', '$disponibilidad', '$id_dewey', '$id_editorial', '$id_editorial', '$edicion', '$año')");

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

<html lang="es">

	<head>

		<title>INSERTAR DATOS LIBROS</title>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

		<link rel="stylesheet" href="css/estilos.css" rel="stylesheet">

		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	</head>

	<body>

		<header>

			<div class="alert alert-info">

				<h2>Insertar Registros a la BD </h2>

			</div>

		</header>

	
			<!-- //////////FORMULARIO PARA INSERTAR DATOS//////////// -->
	<?php include "navigation_bar.php";?>
<br>
 
<form  id="form-libro" action="insertar_libro.php" method="post" style="padding-bottom: 1%;"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>

        <h3 style="text-align: center; color:white">INSERTAR NUEVO LIBRO</h3>
        
        <p><span class="error">* Campos Requeridos</span></p>

        <input name="id_libro" id="id_libro" type="text" placeholder="id_libro" autocomplete="on" required>
        <div id="existeLibro"></div>


        <input name="titulo" type="text" placeholder="titulo" required>

        
      <select name="nautor" id="nautor" class="select-css">
        <input name="autor" type="text" placeholder="Nombre autor" required>
            <?php
            while($registroAutor  = $queryAutor->fetch_array( MYSQLI_BOTH)){ ?>
            <option value="<?php echo $registroAutor['id_autor'];?>"><?php echo $registroAutor['nombre_autor'] . " " .  $registroAutor['apellido_autor'];?></option>-->
            <?php } ?>
            
           
            <option value="nuevo">Nuevo</option>
        </select>
        <br>
        <div id="dAutorNuevo">
            <input name="nombre_autor" type="text" >
            
            <input name="apellido_autor" type="text">			
        </div>
        <div id="dAutorexiste">
            <input name="idautor" id="idautor" type="text">
        </div>
        
        <select name="editoriale" id="editoriale" class="select-css">
        <option selected="true" value="" disabled>Seleccione Editorial</option>
            <?php
            while($registroEditorial  = $queryEditorial->fetch_array( MYSQLI_BOTH)){ ?>
            <option value="<?php echo $registroEditorial['id_editorial'];?>"><?php echo $registroEditorial['editorial'];?></option>
            <?php } ?>
            <option value="nueva">Nueva</option>
            
        </select>

        <div id="editorialNuevo">
            <input name="editorial"  id="editorial" type="text" placeholder="editorial" >
            <input name="ciudad"  id="ciudad" type="text" placeholder="ciudad" >

        </div>  
        
        <div id="editorialExiste">
            <input name="ideditorial" id="ideditorial" type="text" >
        </div>

        
        <input name="edicion" type="text" placeholder="edicion" required>
        
        
          <select name="clasifica" id="clasifica" class="select-css">
            <option selected="true" value="" disabled>Seleccione Clasificación</option>
                <?php
                while($registroClasifica  = $queryDewey->fetch_array( MYSQLI_BOTH)){ ?>
                <option value="<?php echo $registroClasifica['id_dewey'];?>"><?php echo $registroClasifica['dewey_clasificacion'];?></option>
                <?php } ?>
                 
            </select>


        <input name="anio" type="number" min="1500" placeholder="anio" required>

        <input name="disponibilidad" type="number" min="1" placeholder="disponibilidad" required>

         <input name="insertar" id="insertar" type="submit" value="Insertar Datos" class="button"> 
        <!--<button id="insertar" name="insertar" class="button">Insertar</button>-->
    </form>
    <br>
		<section>
			<!-- ///////////// T A B L A   LIBRO ///////////////////-->

			<div>

				<h3 class="text-center">LIBRO</h3>

				<table class="table">

					<tr class="info">

						<th>ISBN</th>

						<th>TITULO</th>

						<th>EDICION</th>

						<th>AÑO</th>

						<th>DISPONIBILIDAD</th>

				    </tr>

				  <?php

				  while($registroLibro  = $queryLibro->fetch_array( MYSQLI_BOTH)) 

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



				<h3 class="text-center">AUTOR</h3>

				<table class="table col-md-6">

					<tr class="info">

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



				<h3 class="text-center">EDITORIAL</h3>

				<table class="table col-md-6">

					<tr class="info">

						<th>EDITORIAL/th>

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



				<h3 class="text-center">CLASIFICACION</h3>

				<table class="table col-md-6">

					<tr class="info">

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
 
	</body>



</html>





