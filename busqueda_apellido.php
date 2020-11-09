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
 require ('conecta.php');

  // $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //echo "conexion exitosa";

  if(mysqli_connect_errno()){

    echo "Fallo la conexion a la Base de datos";

    exit();
}

//////////////// VALORES INICIALES ///////////////////////
mysqli_set_charset($conn, "utf8");
$tabla="";
$query="SELECT  a.nombre_autor, a.apellido_autor, l.titulo, l.id_libro, d.disponibilidad 
      FROM autor a
      INNER join libro l ON  l.id_autor = a.id_autor
      INNER join disponibilidad d ON  d.id_libro = l.id_libro
      WHERE nombre_autor OR apellido_autor
      LIKE '%$q'";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['autor']))
{
	$q=$conn->real_escape_string($_POST['autor']);
	// $query="SELECT  a.nombre_autor, a.apellido_autor, l.titulo, l.id_libro, d.disponibilidad 
  //     FROM autor a
  //     INNER join libro l ON  l.id_autor = a.id_autor
  //     INNER join disponibilidad d ON  d.id_libro = l.id_libro
  //     WHERE nombre_autor OR apellido_autor
  //     LIKE '%$q%'";
  //     echo $query;
  $query = "SELECT libro.*, autor.nombre_autor, autor.apellido_autor, disponibilidad.disponibilidad
  FROM libro, autor, disponibilidad
  WHERE libro.id_autor = autor.id_autor AND 
  libro.disponibilidad = disponibilidad.id_disponibilidad AND 
    autor.nombre_autor LIKE '%$q%'";
}

$buscarAutor=$conn->query($query);
if ($buscarAutor->num_rows > 0)
{
	$tabla.= 
	'<table border="1" align="center">
		<tr>
			<th>NOMBRE AUTOR</th>	
			<th>APELLIDO AUTOR</th>	
			<th>TITULO</th>
			<th>ISBN</th>
			<th>DISPONIBILIDAD</th>
					
		</tr>';

	while($filaAutor= $buscarAutor->fetch_assoc())
	{
		$tabla.=
		'<tr> 
			<td>'.$filaAutor['nombre_autor'].'</td>
			<td>'.$filaAutor['apellido_autor'].'</td>
			<td>'.$filaAutor['titulo'].'</td>
			<td>'.$filaAutor['id_libro'].'</td>
			<td>'.$filaAutor['disponibilidad'].'</td>
						
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