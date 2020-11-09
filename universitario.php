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
 
  <title>Universitarios </title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/loginn.css">
    <link rel="stylesheet" href="css/mis_estilos.css">
    <link rel="stylesheet" href="css/css-tablas1.css"> 
   
  
   

</head>

<body>
 
    <div class="header">

      <h1>BIBLIOTECA</h1>
      <h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>
   </div>
   <?php include "navigation_bar.php";?>
   <div align="center">
      <h3>Busqueda por Universitario</h3>
   </div>
  
  <?php
  
  $universitariosPorPagina = 3;
// Por defecto es la página 1; pero si está presente en la URL, tomamos esa
$pagina = 1;
if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}
# El límite es el número de universitarios por página
$limit = $universitariosPorPagina;
# El offset es saltar X alumnos que viene dado por multiplicar la página - 1 * los universitarios por página
$offset = ($pagina - 1) * $alumnosPorPagina;
# Necesitamos el conteo para saber cuántas páginas vamos a mostrar
$sentencia = $conn->query("SELECT count(*) AS conteo FROM universitario");
$conteo = $sentencia->fetchObject()->conteo;
# Para obtener las páginas dividimos el conteo entre los universitarios por página, y redondeamos hacia arriba
$paginas = ceil($conteo / $universitariosPorPagina);

# Ahora obtenemos los productos usando ya el OFFSET y el LIMIT
$sentencia = $conn->prepare("SELECT  u.estatus, u.clave, q.id_users, q.nombre, u.apellido_pat, u.apellido_mat, q.email, q.password, u.telefono, u.id_rol
      FROM users q
      INNER join universitario u 
      ON  u.id_users = q.id_users
      WHERE clave
      LIKE '%$q%'
LIMIT ? OFFSET ?");
$sentencia->execute([$limit, $offset]);
$universitarios = $sentencia->fetchAll(PDO::FETCH_OBJ);

# Y más abajo los dibujamos...
?>

    <div class="col-xs-6">
       
        <table border="1"  >
            <thead>
            <tr>
                <th>ESTATUS</th>
                <th>ROL</th>
                <th>CLAVE</th>
                <th>NOMBRE(S)</th>
                <th>APELLIDO PAT</th>
                <th>APELLIDO MAT</th>
                <th>TELEFONO</th>
                <th>EMAIL</th>
                <th>ACCION</th>
                
              
            </tr>
            </thead>
            <tbody>
            <?php foreach ($universitarios as $universitario) { ?>
                <tr>
                    <td align="center"><?php echo $universitario ->estatus ?></td>
                    <td align="center"><?php echo $universitario ->id_rol ?></td>
                    <td><?php echo $universitario->clave ?></td>
                    <td><?php echo $universitario->nombre ?></td>
                    <td><?php echo $universitario ->apellido_pat ?></td>
                    <td><?php echo $universitario->apellido_mat ?></td>
                    <td><?php echo $universitario->telefono ?></td>
                    <td><?php echo $universitario->email ?></td>
                    <td><a href="editar_alumno.php?id=<?php echo $universitario->clave ?>">Editar</td>
                    <a href="./editar.php?id=<?php echo $r["id"];?>" class="btn btn-sm btn-warning">Editar</a>
                  
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <nav>
            <div class="row">
                <div class="col-xs-12 col-sm-6">

                    <p>Mostrando <?php echo $universitariosPorPagina ?> de <?php echo $conteo ?> Universitarios activos e inactivos</p>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
                </div>
            </div>
            <ul class="pagination">
                <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
                <?php if ($pagina > 1) { ?>
                    <li>
                        <a href="./universitario.php?pagina=<?php echo $pagina - 1 ?>">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php } ?>

                <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
                <?php for ($x = 1; $x <= $paginas; $x++) { ?>
                    <li class="<?php if ($x == $pagina) echo "active" ?>">
                        <a href="./universitario.php?pagina=<?php echo $x ?>">
                            <?php echo $x ?></a>
                    </li>
                <?php } ?>
                <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
                <?php if ($pagina < $paginas) { ?>
                    <li>
                        <a href="./universitario.php?pagina=<?php echo $pagina + 1 ?>">
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