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
    <link rel="stylesheet" href="css/loginn.css"> 
    <link rel="stylesheet" href="css/css-tablas.css"> 

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
	
<?php

/////// CONEXIÓN A LA BASE DE DATOS /////////
 
//////////////// VALORES INICIALES ///////////////////////
mysqli_set_charset($conn, "utf8");
$tabla="";
$query="SELECT  u.clave, q.id_users, q.nombre, u.apellido_pat, u.apellido_mat, q.email, q.password 
      FROM users q
      INNER join universitario u 
      ON  u.id_users = q.id_users
      WHERE clave
      LIKE '%%'";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['clave']))
{
	$q=$conn->real_escape_string($_POST['clave']);
	$query="SELECT  u.clave, q.id_users, q.nombre, u.apellido_pat, u.apellido_mat, q.email, q.password 
      FROM users q
      INNER join universitario u 
      ON  u.id_users = q.id_users
      WHERE clave
      LIKE '%$q%'";
}

$buscarAlumno=$conn->query($query);
if ($buscarAlumno->num_rows > 0)
{
	$tabla.= 
	'<table border="1" align="center">
		<tr>
			<th>CLAVE</th>	
			<th>USUARIO</th>	
			<th>NOMBRE</th>
			<th>APELLIDO PATERNO</th>
			<th>APELLIDO MATERNO</th>
			<th>EMAIL</th>
			<th>PASSWORD</th>
		
		</tr>';

	while($filaAlumno= $buscarAlumno->fetch_assoc())
	{
		$tabla.=
		'<tr> 
			<td>'.$filaAlumno['clave'].'</td>
			<td>'.$filaAlumno['id_users'].'</td>
			<td>'.$filaAlumno['nombre'].'</td>
			<td>'.$filaAlumno['apellido_pat'].'</td>
			<td>'.$filaAlumno['apellido_mat'].'</td>
			<td>'.$filaAlumno['email'].'</td>
			<td>'.$filaAlumno['password'].'</td>
			
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
