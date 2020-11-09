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


$query="SELECT  u.estatus, u.clave, q.id_users, q.nombre, u. apellido_pat, a.id_carrera, a.turno, q.email
      FROM users q, alumno a
      INNER join universitario u 
      ON  u.id_users = q.id_users
      WHERE a.clave
      LIKE '%%'";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['clave']))
{
	$q=$conn->real_escape_string($_POST['clave']);
	$query="SELECT  u.estatus, u.clave, q.id_users, q.nombre, u.apellido_pat, u.apellido_mat, q.email, q.password
      FROM users q
      INNER join universitario u 
      ON  u.id_users = q.id_users
      WHERE clave
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
			<th>USUARIO</th>	
			<th>NOMBRE</th>
			<th>APELLIDO PATERNO</th>
			<th>CARRERA</th>
			<th>TURNO</th>
			<th>EMAIL</th>
			<th>ACCIONES</th>
		
		
		</tr>';

	while($filaAlumno= $buscarAlumno->fetch_assoc())
	{
		$tabla.=
		'<tr> 
			<td>'.$filaAlumno['estatus'].'</td>
			<td>'.$filaAlumno['clave'].'</td>
			<td>'.$filaAlumno['id_users'].'</td>
			<td>'.$filaAlumno['nombre'].'</td>
			<td>'.$filaAlumno['apellido_pat'].'</td>
			<td>'.$filaAlumno['id_carrera'].'</td>
			<td>'.$filaAlumno['turno'].'</td>
			<td>'.$filaAlumno['email'].'</td>
			<td>
			    <button href="actualizar_alumno.php?clave=<?php echo'.$filaAlumno['clave'].'">Actualizar</button>
	            <button href="eliminar_alumno.php" >Eliminar</button></td>
		
			
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

<script>
    $(document).ready(function(){
    $('#data').after('<div id="nav"></div>');
    var rowsShown = 5;
    var rowsTotal = $('#data tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#data tbody tr').hide();
    $('#data tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
    });

    // $(document).on('click', '.cicloactual', function(){
    //         cargar_productos();                      
    //     });

});
</script>
<?php include "footer.php";?>







