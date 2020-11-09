<?php
require_once 'conecta.php';

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  //echo "conexion exitosa";
?>

<!DOCTYPE html>

<html lang="es">
  <head><meta charset="gb18030">
 
  <title>Busqueda </title>
   
    <link rel="stylesheet" href="css/loginn.css"> 
    <link rel="stylesheet" href="css/css-tablas.css"> 
    <link rel="stylesheet" href="css/botones.css"> 
</head>

<body>
 
    <div class="header">

      <h1>BIBLIOTECA</h1>
      <h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>
   </div>
   
     
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  

  <div class="btn-group-hor">
  <a href="../cerrar-Sesion.php" class="button">Cerrae sesión</a>
<a href="../loginn.php" class="button">Regresar</a>
<a href="../index.php" class="button">Inicio</a>

</div>



<h2>Busqueda por ...</h2>

     
<input type="text" id="nombre_autor" name="nombre_autor" class="cambio" />
<br /><br />
<div align="center">
    <form name="titulo_del_libro" method="POST" action="busqueda_titulo.php">
    Titulo del libro:<input type="text" name="titulo" placeholder="Escriba el titulo del libro" required/>
    <input type="submit" value="Buscar" name="btn2"></form>
    </div>
    <br>
<div align="center">
    <form name="nombre_del_autor" method="POST" action="busqueda_autor.php">
    Nombre del Autor:<input type="text" name="autor" placeholder="Escriba el nombre del autor" required/>
    <input type="submit" value="Buscar" name="btn3"></form>
    </div>
    <br>
    <div align="center">
    <form name="titulo_del_libro" method="POST" action="busqueda_autor.php">
    Titulo del libro:<input type="text" name="titulo" placeholder="Escriba el titulo del libro" required/>
    <input type="submit" value="Buscar" name="btn2"></form>
    </div>
    <br>
<div align="center">
    <form name="nombre_del_autor" method="POST" action="busqueda_autor.php">
    ISBN:<input type="text" name="autor" placeholder="Escriba el nombre del autor" required/>
    <input type="submit" value="Buscar" name="btn3"></form>
    </div>
    <br>




  
<?php

/////// CONEXIÓN A LA BASE DE DATOS /////////
 require ('conecta.php');

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //echo "conexion exitosa";

  if(mysqli_connect_errno()){

    echo "Fallo la conexion a la Base de datos";

    exit();
}

//////////////// VALORES INICIALES ///////////////////////
mysqli_set_charset($conn, "utf8");
$tabla="";
$query="SELECT  a.id_autor, a.nombre_autor, a.apellido_autor, l.titulo, ellido_mat, q.email, q.password 
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
  
  <a href="../pdf/dompdf/imprimirPdf.php"> Crear PDF</a>
  <?php
echo $tabla;


?>




