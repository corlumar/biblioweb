<?
/////// CONEXIÓN A LA BASE DE DATOS /////////
require_once ('conecta.php');

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  echo "conexion hecha";

if ($conn -> connect_errno)
{
	die("Fallo la conexion:(".$conn -> mysqli_connect_errno().")".$conn-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT q.id_users, u.clave, q.nombre, u.apellido_pat, u.apellido_mat, q.email, q.password FROM users q
INNER join universitario u ON  u.id_users = q.id_users";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['universitario']))
{
	$q=$conn->real_escape_string($_POST['universitario']);
	$query="SELECT a.clave, u.nombre, u.apellido_pat, c.carrera, p.id_libro, p.fecha_prestamo, d.fecha_devolucion FROM alumno a 
		INNER JOIN universitario u ON u.clave = a.clave
		INNER JOIN carrera c ON c.id_carrera = a.id_carrera
		INNER JOIN prestamo p ON p.clave = a.clave
		INNER JOIN devolucion d ON d.clave = a.clave
		WHERE clave LIKE %".$q."%'";
	

	/*$query="SELECT * FROM alumnos WHERE 
		id_alumno LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%' OR
		carrera LIKE '%".$q."%' OR
		grupo LIKE '%".$q."%' OR
		fecha_ingreso LIKE '%".$q."%'";*/
}

$buscarAlumno=$conn->query($query);
if ($buscarAlumno->num_rows > 0)
{
	$tabla.= 
	'<table class="table">
		<tr class="bg-primary">
			<td>ID ALUMNO</td>
			<td>NOMBRE</td>
			<td>CARRERA</td>
			<td>GRUPO</td>
			<td>FECHA INGRESO</td>
		</tr>';

	while($filaAlumno= $buscarAlumno->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaAlumnos['clave'].'</td>
			<td>'.$filaAlumnos['nombre'].'</td>
			<td>'.$filaAlumnos['apellido_pat'].'</td>
			<td>'.$filaAlumnos['carrera'].'</td>
			<td>'.$filaAlumnos['id_libro'].'</td>
			<td>'.$filaAlumnos['fecha_prestamo'].'</td>
			<td>'.$filaAlumnos['fecha_devolucion'].'</td>
		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>
<!DOCTYPE html>

<html lang="es">
  <head>
 
  <title>Busqueda </title>
   <meta charset="utf-8">
    <link rel="stylesheet" href="css/loginn.css"> 

</head>

<body>
 
    <div class="header">

      <h1>BIBLIOTECA</h1>
      <h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>
   </div>
   <div align="center">
      <h3>RESULTADO DE LA BUSQUEDA</h3>
 

 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
  </head>
<body>

	<br>

	<table border="1" align="center">
		<tr>
			<th>CLAVE</th>
			<th>NOMBRE</th>
			<th>APELLIDO PATERNO</th>
			<th>CARRERA</th>
			<th>ISBN</th>
			<th>FECHA PRESTAMO</th>
			<th>FECHA DEVOLUCION</th>
			
		</tr>
