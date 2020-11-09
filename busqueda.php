	<?php

	include 'conecta.php';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

echo "conexion realizada";
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	?>
<!DOCTYPE html>

<html lang="es">
  <head>
   
<title>Busqueda Acervo</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
  </head>
<body>

<div class="container">
	<?php

	include 'conecta.php';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

echo "conexion realizada";
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$titulo=$_POST["titulo"];
	$buscar_libro="SELECT * FROM libro WHERE titulo='$titulo'";
	//echo $buscar_autor;
	$resultado = mysqli_query($conn,$buscar_libro); 
    if($fila = mysqli_fetch_assoc($resultado))
    {

      $idautor=$fila["id_autor"];
      $buscar_autor="SELECT * FROM autor WHERE id_autor=$idautor";
	  //echo $buscar_autor;
	  $result = mysqli_query($conn,$buscar_autor); 

      if($row= mysqli_fetch_assoc($result))
      {
        $nomautor=$row["nombre_autor"];
        $apellautor=$row["apellido_autor"];
        $emailautor=$row["email_autor"];
        $idlibro=$row["id_libro"];
        $titulolibro=$row["titulo"];
       
      }

    $idautor=$fila["id_"];
      $buscar_autor="SELECT * FROM `prestamo` join alumno";
    //echo $buscar_autor;
    $result = mysqli_query($conn,$buscar_prestamo); 

      if($row= mysqli_fetch_assoc($result))
      {
        $idprestamo=$row["id_prestamo"];
        $clave=$row["clave"];
        $fecha_prestamo=$row["fecha_prestamo"];
        $id_libro=row["id_libro"];
        $id_carrera=row["id_carrera"];
        $turno=row["turno"]


    

?>
 
    <table>
     <tr>
       <td>Id Autor</td>
       <td>Nombre Autor</td>
       <td>Apellido Autor</td>
       <td>Email Autor</td>
       <td>Id Libro</td>
       <td>Titulo</td>
     
      <tr>
     <tr>
       <td><?php echo $idautor;?></td>
       <td><?php echo $nomautor;?></td>
       <td><?php echo $apellautor;?></td>
       <td><?php echo $emailautor;?><td>
       <td><?php echo $idlibro;?></td>
       <td><?php echo $titulolibro;?></td>
       
      <tr>  
</div>
	
  </body>
</html>
