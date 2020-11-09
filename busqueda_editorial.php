<?php
require_once 'conecta.php';

//   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$q = $_POST['prestamo'];

  //echo "conexion exitosa";
?>

<!DOCTYPE html>

<html lang="es">
  <head>
 
  <title>Busqueda </title>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script> language ="javascript" src="js/jquery.js"</script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

        $query = "SELECT * FROM editorial WHERE editorial
         like '%$q%'";

// echo $query;

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['libro']))
{
	$q=$conn->real_escape_string($_POST['libro']);
		$query = "SELECT * FROM editorial WHERE editorial
        like '%$q%'";
}

$buscarEditorial=$conn->query($query);
if ($buscarEditorial->num_rows > 0)
{
	$tabla.= 
	'<table border="1" align="center">
		<tr>
		    <th>ID_EDITORIAL</th>
			<th>EDITORIAL</th>	
			<th>CIUDAD</th>	
			
			
		
		</tr>';

	while($filaEditorial= $buscarEditorial->fetch_assoc())
	{
		$tabla.=
		'<tr> 
	    	<td>'.$filaEditorial['id_editorial'].'</td>
			<td>'.$filaEditorial['editorial'].'</td>
			<td>'.$filaEditorial['ciudad'].'</td>
		
			
			
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
<br>
<?php include "footer.php";?>

</body>
</html>