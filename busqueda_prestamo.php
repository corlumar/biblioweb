<?php
require_once 'conecta.php';

//   $conn} = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$clave = $_POST['prestamo'];
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
 require ('conecta.php');

//   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //echo "conexion exitosa";

  if(mysqli_connect_errno()){

    echo "Fallo la conexion a la Base de datos";

    exit();
}

//////////////// VALORES INICIALES ///////////////////////
mysqli_set_charset($conn, "utf8");
$tabla="";
$query="SELECT  l.id_libro, u.clave, s.nombre, u.apellido_pat, u.apellido_mat, r.rol, p.fecha_prestamo
FROM universitario u
INNER JOIN prestamo p ON p.clave = u.clave
INNER JOIN libro l ON l.id_libro = p.id_libro
INNER JOIN users s ON s.id_users = u.id_users
INNER JOIN rol r ON r.id_rol = u.id_rol
WHERE u.clave
LIKE '%%'";

    	

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['prestamo']))
{
	$q=$conn->real_escape_string($_POST['prestamo']);
// 	$query="SELECT  l.id_libro, a.clave, s.nombre, u.apellido_pat, u.apellido_mat, r.rol, p.fecha_prestamo
// FROM universitario u
// INNER JOIN prestamo p ON p.clave = u.clave
// INNER JOIN libro l ON l.id_libro = p.id_libro
// INNER JOIN users s ON s.id_users = u.id_users
// INNER JOIN rol r ON r.id_rol = u.id_rol
// WHERE u.clave = '$q'";
$query="SELECT l.id_libro , s.nombre, u.apellido_pat, u.apellido_mat, r.rol, p.fecha_prestamo, p.clave FROM universitario u INNER JOIN prestamo p ON p.clave = u.clave INNER JOIN libro l ON l.id_libro = p.id_libro INNER JOIN users s ON s.id_users = u.id_users 
INNER JOIN rol r ON r.id_rol = u.id_rol 
WHERE p.clave = '$q'";

// echo $query;
}

$buscarPrestamo=$conn->query($query);
if ($buscarPrestamo->num_rows > 0)
{
	$tabla.= 
	'<table border="1" align="center">
		<tr>
			<th>ISBN</th>	
			<th>CLAVE USUARIO</th>	
			<th>NOMBRE</th>
			<th>APELLIDO PATERNO</th>
			<th>APELLIDO MATERNO</th>
			<th>ROL</th>
			<th>FECHA DEL PRESTAMO</th>
					
		</tr>';

	while($filaPrestamo= $buscarPrestamo->fetch_assoc())
	{
		$tabla.=
		'<tr> 
			<td>'.$filaPrestamo['id_libro'].'</td>
			<td>'.$filaPrestamo['clave'].'</td>
			<td>'.$filaPrestamo['nombre'].'</td>
			<td>'.$filaPrestamo['apellido_pat'].'</td>
			<td>'.$filaPrestamo['apellido_mat'].'</td>
			<td>'.$filaPrestamo['rol'].'</td>
			<td>'.$filaPrestamo['fecha_prestamo'].'</td>
						
		 </tr>
 		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}

	?>
	<a href="../pdf/dompdf/imprimirPdf.php"> Crear PDF</a>
	<?php
echo $tabla;


?>

</body>
</html>