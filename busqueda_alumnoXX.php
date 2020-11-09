<?php
require_once 'conecta.php';

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  //echo "conexion exitosa";
?>

<!DOCTYPE html>

<html lang="es">
  <head>
 
  <title>Busqueda </title>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/loginn.css"> 
	<link rel="stylesheet" href="css/mis_estilos.css">
	<link rel="stylesheet" href="css/css-tablas.css"> 


</head>

<body>
 
    <div class="header">

      <h1>BIBLIOTECA</h1>
      <h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>
   </div>
   <?php include "navigation_bar.php";?>
   <div align="center">
	  <h3>RESULTADO DE LA BUSQUEDA</h3>
   </div>
 
  </head>
<body>
	
<?php

/////// CONEXIÓN A LA BASE DE DATOS /////////
 require ('conecta.php');

//   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //echo "conexion exitosa";

  if(mysqli_connect_error()){

    echo "Fallo la conexion a la Base de datos";

    exit();
}

//////////////// VALORES INICIALES ///////////////////////
mysqli_set_charset($conn, "utf8");
$tabla="";
$query="SELECT  u.estatus, a.clave, a.id_carrera, u.telefono, a.turno
      FROM users q, alumno a
      INNER join universitario u 
      WHERE u.clave = a.clave
      LIKE '%%'";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['clave']))
{
	$q=$conn->real_escape_string($_POST['clave']);
	$query="SELECT  u.estatus, a.clave, a.id_carrera, u.telefono, a.turno
      FROM users q, alumno a
      INNER join universitario u 
      WHERE u.clave = a.clave
      LIKE '%$q%'";
}
// echo $query;
$buscarAlumno=$conn->query($query);
if ($buscarAlumno->num_rows > 0)
{
	$tabla.= 
	'<table align="center">

		<tr>
		    <th>ESTATUS</th>
			<th>CLAVE</th>	
			<th>CARRERA</th>
			<th>NOMBRE</th>
			<th>TELEFONO</th>
			<th>ACCIONES</th>
		
		
		</tr>';

	while($filaAlumno= $buscarAlumno->fetch_assoc())
	{
		$tabla.=
		'<tr> 
			<td>'.$filaAlumno['estatus'].'</td>
			<td>'.$filaAlumno['clave'].'</td>
			<td>'.$filaAlumno['carrera'].'</td>
			<td>'.$filaAlumno['nombre'].'</td>
			<td>'.$filaAlumno['telefono'].'</td>
			<td>
			    <a href="actualizar_alumno.php?clave=<?php echo'.$filaAlumno['clave'].'">Actualizar</a>
	            <a href="desactualizar_alumno.php" >Desactivar</a></td>
		
			
		 </tr> ';
	}

	$tabla.='</table>';


} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


	?>

	<?php
echo $tabla;


?>
<br>
<?php include "footer.php";?>