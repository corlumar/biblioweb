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
 
  <title>Editoriales </title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/loginn.css">
    <link rel="stylesheet" href="css/mis_estilos.css"> 
    <link rel="stylesheet" href="css/css-tablas.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
 
    <div class="header">

      <h1>BIBLIOTECA</h1>
      <h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>
   </div>
   <?php include "navigation_bar.php";?>
   <div align="center">
          <h3>EDITORIALES REGISTRADAS</h3>
   </div>
  
  <?php
  

  $editorialesPorPagina = 5;
// Por defecto es la página 1; pero si está presente en la URL, tomamos esa
$pagina = 1;
if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}
# El límite es el número de autores por página
$limit = $editorialesPorPagina;
# El offset es saltar X productos que viene dado por multiplicar la página - 1 * los productos por página
$offset = ($pagina - 1) * $editorialesPorPagina;
# Necesitamos el conteo para saber cuántas páginas vamos a mostrar
$sentencia = $conn->query("SELECT count(*) AS conteo FROM editorial");
$conteo = $sentencia->fetchObject()->conteo;
# Para obtener las páginas dividimos el conteo entre los productos por página, y redondeamos hacia arriba
$paginas = ceil($conteo / $editorialesPorPagina);

# Ahora obtenemos los productos usando ya el OFFSET y el LIMIT
$sentencia = $conn->prepare("SELECT id_editorial, editorial, ciudad FROM editorial LIMIT ? OFFSET ?");
$sentencia->execute([$limit, $offset]);
$editoriales = $sentencia->fetchAll(PDO::FETCH_OBJ);
# Y más abajo los dibujamos...
?>

 <div class="col-xs-12">
       
        <table border="1" align="center">
            <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE EDITORIAL</th>
                <th>CIUDAD DE LA EDITORIAL</th>
                
            </tr>
            </thead>
            <tbody>
            <?php foreach ($editoriales as $editorial) { ?>
                <tr>
                    <td><?php echo $editorial ->id_editorial ?></td>
                    <td><?php echo $editorial ->editorial ?></td>
                    <td><?php echo $editorial->ciudad ?></td>
                  
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <nav>
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <p>Mostrando <?php echo $editorialesPorPagina ?> de <?php echo $conteo ?> Editoriales registradas</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <ul class="pagination">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li>
                        <a href="./editorial.php?pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="<?php if ($x == $pagina) echo "active" ?>">
                        <a href="./editorial.php?pagina=<?php echo $x ?>">
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a href="./editorial.php?pagina=<?php echo $pagina + 1 ?>">
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