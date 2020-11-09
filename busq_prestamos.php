<!DOCTYPE html>

<html lang="es">
  <head>
 
  <title>Busqueda </title>
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

<center>
      <table width=100%>
        <thead>
      <tr>
     <tr>
       <th width=20%>Clave del Alumno</th>
       <th width=20%>Nombre del Alumno</th>
       <th width=20%>ISBN del Libro</th>
       
     
      <tr>
     <

	<?php
require_once 'conecta.php';

  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	echo "conexion exitosa";
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
    $sql="SELECT a.clave, u.nombre, p.id_libro FROM alumno a INNER JOIN prestamo p ON a.clave = p.clave INNER JOIN universitario u ON u.clave=a.clave='$prestamos'"
    $resultado = mysqli_query($conexion, $sql);

    while($mostrar=mysqli_fetch_array($resultado)){

?>
      <tr>
        tr>
       <td><?php echo $mostrar['Clave'] ?></td>
       <td><?php echo $mostrar['Nombre'] ?></td>
       <td><?php echo $mostrar['ISBN '] ?></td>
     </tr>
<?php
    }
  ?>
</body>

</html>
	
	<!-- $titulo=$_POST["Prestamos"];
	$buscar_alumno='$id_alumno';
  "SELECT a.clave, u.nombre, p.id_libro FROM alumno a INNER JOIN prestamo p ON a.clave = p.clave INNER JOIN universitario u ON u.clave=a.clave='$prestamos'";


	$resultado = mysqli_query($conn,$buscar_clave); 
    if($fila = mysqli_fetch_assoc($resultado))
    {
      $clave=$fila["clave"];
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
 
    
      
      <th>  
</div>
	
  </body>
</html>
 -->