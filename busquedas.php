<!DOCTYPE html>
<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');
session_start();
if(!isset($_SESSION['nombre']))
{
    header('Location: loginn.php');
}
?>
<html lang="es">
  <head>
 <body>
  <section class="grid-container">
    <div class="header"><h1>BIBLIOTECA</h1>
      <h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>
    </div>
<title>Busqueda Acervo</title>
    
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/loginn.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
  </head>

<body>
<div align='center'>
<table border='1' cellpadding='0' cellspacing='0' width='80%' bgcolor='#F6F6F6' bordercolor='#FFFFFF'>
<tr>
<td width='150' style='font-weight: bold'>CLAVE</td>
<td width='250' style='font-weight: bold'>NOMBRE</td>
<td width='250' style='font-weight: bold'>APELLIDOS</td>
<td width='100' style='font-weight: bold'>SEXO</td>
<td width='250' style='font-weight: bold'>EMAIL</td>
<td width='200' style='font-weight: bold'>TELEFONO</td>
<td width='200' style='font-weight: bold'>FECHA INGRESO</td>
<td width='150' style='font-weight: bold'>CARRERA</td>
<td width='250' style='font-weight: bold'>TURNO</td>
<td width='150' style='font-weight: bold'>TELEFONO</td>
</tr>
<?php
require_once ('conecta.php');

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  echo "conexion exitosa";


$result = mysql_query = "SELECT a.clave, u.nombre, p.id_libro FROM alumno a INNER JOIN prestamo p ON a.clave = p.clave INNER JOIN universitario u ON u.clave=a.clave"; // Esta linea hace la consulta
if ($row = mysql_fetch_array(result))
 echo "<table border = '1'> \n";
  echo "<tr><td>CLAVE</td><td>NOMBRE</td></tr> \n";
  do{
    echo "<tr><td>".$row["clave"]."</td><td>".$row["nombre"]."</td></tr> \n"; 
  }
}

while ($registro = mysql_fetch_array($result)){
echo "
<tr>
<td width='150'>".$registro['clave']."</td>
<td width='150'>".$registro['nombre']."</td>
<td width='150'>".$registro['Apellidos']."</td>
<td width='150'>".$registro['sexo']."</td>
<td width='150'>".$registro['email']."</td>
<td width='150'>".$registro['telefono']."</td>
<td width='150'>".$registro['fecha_ingreso']."</td>
<td width='150'>".$registro['carrera']."</td>
<td width='150'>".$registro['turno']."</td>
<td width='150'>".$registro['telefono']."</td>
<td width='150'></td>

</tr>
";
}

?>
</table>
</div>
</body>

</html>
<title>Busqueda Rapida </title>
   <meta charset="utf-8">
    <link rel="stylesheet" href="css/loginn.css"> 

</head>

<body>
  <section class="grid-container">
    <div class="header"><h1>BIBLIOTECA</h1>
      <h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>
    </div>
 <title>Busqueda Acervo</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
  </head>
<body>

<div class="container">
	<?php

	include ('conecta.php');

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$titulo=$_POST["Prestamos"];
	$buscar_alumno='$id_alumno';
  $registrosAlumnos = mysql_query("SELECT a.clave, u.nombre, p.id_libro FROM alumno a INNER JOIN prestamo p ON a.clave = p.clave INNER JOIN universitario u ON u.clave=a.clave='$prestamos'");


	$resultado = mysqli_query($conn,$buscar_alumno); 
    if($fila = mysqli_fetch_assoc($resultado))
    {
      $idautor=$fila["id_autor"];
      $buscar_alumno="SELECT * FROM alumno WHERE clave=$clave";
	  //echo $buscar_autor;
	  $result = mysqli_query($conn,$buscar_alumno); 

      if($row= mysqli_fetch_assoc($result))
      {
        $nomautor=$row["clave"];
        $apellautor=$row["nombre"];
        $emailautor=$row["id_libro"];
        
       
      }
    }

?>
 
	
  </body>
</html>
 