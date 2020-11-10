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
	 
<?php

	require ('conecta.php');

//   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //echo "conexion exitosa";

  if(mysqli_connect_errno()){

    echo "Fallo la conexion a la Base de datos";

    exit();
}

	mysqli_set_charset($conn, "utf8");
$tabla="";
$query="SELECT libro.*, autor.nombre_autor, autor.apellido_autor
FROM libro, autor WHERE libro.id_autor = autor.id_autor AND 
autor.nombre_autor
      LIKE '%%'";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['autor']))
{
	$q=$conn->real_escape_string($_POST['autor']);
	$query = "SELECT libro.*, autor.nombre_autor, autor.apellido_autor
FROM libro, autor WHERE libro.id_autor = autor.id_autor AND 
autor.nombre_autor
 LIKE '%$q%'";
}// echo $query;
$buscarTitulo=$conn->query($query);
if ($buscarTitulo->num_rows > 0)
{
	$tabla.= 
	'<table align="center">
		<tr>
			<th>ISBN</th>	
			<th>TITULO</th>	
			<th>AUTOR</th>
			<th>APELLIDO AUTOR</th>
			<th>DISPONIBILIDAD</th>
			
		
		</tr>';

	while($filaTitulo= $buscarTitulo->fetch_assoc())
	{
		$tabla.=
		'<tr> 
			<td>'.$filaTitulo['id_libro'].'</td>
			<td>'.$filaTitulo['titulo'].'</td>
			<td>'.$filaTitulo['nombre_autor'].'</td>
			<td>'.$filaTitulo['apellido_autor'].'</td>
			<td>'.$filaTitulo['disponibilidad'].'</td>
			
			
		 </tr>
		
		';
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
