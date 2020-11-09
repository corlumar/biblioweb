<?php
include('conecta.php');


$dbhost	= "localhost:3306";
$dbuser	= "bibliot8_userfinal";
$dbpass	= "#A&jqwWDL=VJ";
$dbname	= "bibliot8_biblioteca";


try {
    $conn = new PDO('mysql:host=65.99.252.199;dbname=' . $dbname, $dbuser, $dbpass);
    $conn->query("set names utf8;");
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (Exception $e) {
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

?>
<!DOCTYPE html>

<html lang="es">
  <head>
 
  <title>Libros por ISBN </title>
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
      <h3>Busqueda por ISBN</h3>
   </div>
  
  <?php
  
  $isbnsPorPagina = 4;
// Por defecto es la página 1; pero si está presente en la URL, tomamos esa
$pagina = 1;
if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}
# El límite es el número de isbns por página
$limit = $isbnsPorPagina;
# El offset es saltar X isbns que viene dado por multiplicar la página - 1 * los isbn por página
$offset = ($pagina - 1) * $isbnsPorPagina;
# Necesitamos el conteo para saber cuántas páginas vamos a mostrar
$sentencia = $conn->query("SELECT count(*) AS conteo FROM libro");
$conteo = $sentencia->fetchObject()->conteo;
# Para obtener las páginas dividimos el conteo entre los isbns por página, y redondeamos hacia arriba
$paginas = ceil($conteo / $isbnsPorPagina);

# Ahora obtenemos los productos usando ya el OFFSET y el LIMIT
$sentencia = $conn->prepare("SELECT * FROM libro l
INNER JOIN autor a ON a.id_autor = l.id_autor
LIMIT ? OFFSET ?");
$sentencia->execute([$limit, $offset]);
$isbns = $sentencia->fetchAll(PDO::FETCH_OBJ);

# Y más abajo los dibujamos...
?>

    <div class="col-xs-9">
       
        <table border="1" align="center">
            <thead>
            <tr>
                <th>ESTATUS</th>
			    <th>ISBN</th>
			    <th>TITULO</th>	
			    <th>AUTOR</th>
			    <th>APELLIDO AUTOR</th>
			    <th>DISPONIBLE</th>
		<!--    <th>ACCION</th>-->
                
              
            </tr>
            </thead>
            <tbody>
            <?php foreach ($isbns as $isbn) { ?>
                <tr>
                    <td><?php echo $isbn ->estatus ?></td>
                    <td><?php echo $isbn->id_libro ?></td>
                    <td><?php echo $isbn->titulo ?></td>
                    <td><?php echo $isbn ->nombre_autor ?></td>
                    <td><?php echo $isbn->apellido_autor ?></td>
                    <td><?php echo $isbn->disponibilidad ?></td>
              <!--      <td><a href="editar-libro.php?id=<?php echo $isbn->isbn ?>">Editar</td>-->
                  
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <nav>
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <p>Mostrando <?php echo $isbnsPorPagina ?> de <?php echo $conteo ?> ISBN disponibles</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <ul class="pagination">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li>
                        <a href="./busqueda_libro.php?pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="<?php if ($x == $pagina) echo "active" ?>">
                        <a href="./busqueda_libro.php?pagina=<?php echo $x ?>">
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a href="./busqueda_libro.php?pagina=<?php echo $pagina + 1 ?>">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>

  
<?php include "footer.php";?>
</body>
</html>
