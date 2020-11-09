<!DOCTYPE html>

<html lang="es">
  <head>
 
  <title>Autor </title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link rel="stylesheet" href="css/loginn.css"> 
    <link rel="stylesheet" href="css/mis_estilos.css">
    <link rel="stylesheet" href="css/css-tablas.css"> -->
 <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
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
   
  </div>
</div>

<?php

/////// CONEXIÓN A LA BASE DE DATOS /////////
 require ('conecta.php');


  if(mysqli_connect_errno()){

    echo "Fallo la conexion a la Base de datos";

    exit();
}

//////////////// VALORES INICIALES ///////////////////////

mysqli_set_charset($conn, "utf8");
$tabla="";
$query="SELECT  a.nombre_autor, a.apellido_autor
      FROM autor a
      WHERE id_autor
      
     ";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['autor']))
{
	$q=$conn->real_escape_string($_POST['autor']);
	
	$paginacion = mysqli_fetch_array($conn);
    $paginacionTotal = $paginacion['paginacionTotal'];
    
    $por_pagina = 4;
    
    if(empty($_GET['pagina']))
{
   $pagina = 1;
} else{
    $pagina = $GET['pagina'];
    
    }
    
    $desde = ($pagina-1)*$por_pagina;
    $total_paginas = ceil($paginacionTotal / $por_pagina);
    
    

  $query = "SELECT autor.*, autor.nombre_autor, autor.apellido_autor
  FROM autor
  WHERE id_autor 
  LIMIT $desde,$por_pagina
  ";
}

$buscarAutor=$conn->query($query);
if ($buscarAutor->num_rows > 0)
{
	$tabla.= 
	'<table border="1" align="center">
		<tr>
			<th>ID AUTOR</th>
			<th>NOMBRE AUTOR</th>
			<th>APELLIDO AUTOR</th>	
			
					
		</tr>';

	while($filaAutor= $buscarAutor->fetch_assoc())
	{
		$tabla.=
		'<tr> 
			<td>'.$filaAutor['id_autor'].'</td>
			<td>'.$filaAutor['nombre_autor'].'</td>
			<td>'.$filaAutor['apellido_autor'].'</td>
			
						
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
<nav>
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <p>Mostrando <?php echo $por_pagina ?> de <?php echo $conteo ?> Autores disponibles</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <ul class="pagination">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li>
                        <a href="./autores.php?pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="<?php if ($x == $pagina) echo "active" ?>">
                        <a href="./autores.php?pagina=<?php echo $x ?>">
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a href="./autores.php?pagina=<?php echo $pagina + 1 ?>">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
<br>
<?php include "footer.php";?>
</body>
</html>