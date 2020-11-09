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
 
  <title>Titulos </title>
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
      <h3>Busqueda por Titulo</h3>
   </div>
  
  <?php
  

  $titulosPorPagina = 4;
// Por defecto es la página 1; pero si está presente en la URL, tomamos esa
$pagina = 1;
if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}
# El límite es el número de titulos por página
$limit = $titulosPorPagina;
# El offset es saltar X titulos que viene dado por multiplicar la página - 1 * los titulos por página
$offset = ($pagina - 1) * $titulosPorPagina;
# Necesitamos el conteo para saber cuántas páginas vamos a mostrar
$sentencia = $conn->query("SELECT count(*) AS conteo FROM libro");
$conteo = $sentencia->fetchObject()->conteo;
# Para obtener las páginas dividimos el conteo entre los titulos por página, y redondeamos hacia arriba
$paginas = ceil($conteo / $titulosPorPagina);

# Ahora obtenemos los productos usando ya el OFFSET y el LIMIT
$sentencia = $conn->prepare("SELECT * FROM libro l
INNER JOIN autor a ON a.id_autor = l.id_autor
WHERE 1

LIMIT ? OFFSET ?");
$sentencia->execute([$limit, $offset]);
$titulos = $sentencia->fetchAll(PDO::FETCH_OBJ);

# Y más abajo los dibujamos...
?>

    <div class="col-xs-9">
       
        <table border="1" align="center">
            <thead>
            <tr>
                <th>TITULO</th>
                <th>ISBN</th>	
			    <th>AUTOR</th>
			    <th>APELLIDO AUTOR</th>
			    <th>EXISTENCIA</th>
       <!--     <th>ACCION</th>-->
                
              
            </tr>
            </thead>
            <tbody>
            <?php foreach ($titulos as $titulo) { ?>
                <tr>
                    <td><?php echo $titulo ->titulo ?></td>
                    <td><?php echo $titulo ->id_libro ?></td>
                    <td><?php echo $titulo ->nombre_autor ?></td>
                    <td><?php echo $titulo ->apellido_autor ?></td>
                    <td><?php echo $titulo ->disponibilidad ?></td>
                    
               <!--       <td><a href="editar_titulo.php?id=<?php echo $titulo->isbn ?>">Editar</td>-->
                  
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <nav>
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <p>Mostrando <?php echo $titulosPorPagina ?> de <?php echo $conteo ?> Titulos disponibles</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <ul class="pagination">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li>
                        <a href="./titulos.php?pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="<?php if ($x == $pagina) echo "active" ?>">
                        <a href="./titulos.php?pagina=<?php echo $x ?>">
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a href="./titulos.php?pagina=<?php echo $pagina + 1 ?>">
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