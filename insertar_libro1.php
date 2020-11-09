<?php
require_once 'conecta.php';



  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

 echo "conexion exitosa";
 
$idLibro = $_POST['id_libro'];
$titulo = $_POST['titulo'];
$nautor = $_POST['nautor'];
$nombre_autor = $_POST['nombre_autor'];
$apellido_autor = $_POST['apellido_autor'];
$idautor = $_POST['idautor'];
$editoriale = $_POST['editoriale'];
$editorial = $_POST['editorial'];
$ideditorial = $_POST['ideditorial'];
$edicion = $_POST['edicion'];
$anio= $_POST['anio'];
$ciudad = $_POST['ciudad'];
$disponibilidad = $_POST['disponibilidad'];
$dewey_clasificacion = $_POST['clasifica'];
 
    // AUTOR
    if ($nautor=="nuevo")
    {
    // agrega el autor primero
    $inserta_libro = "INSERT INTO autor (nombre_autor, apellido_autor) VALUES ('$nombre_autor', '$apellido_autor')";
    $einsertalibro = mysqli_query($conn, $inserta_libro) or die ("Error al agregar el autor " . mysqli_error($conn));

    // obtengo inmediatamente el nuevo id de autor
    $query_autor=mysqli_query($conn,"select LAST_INSERT_ID(id_autor) as last from autor order by id_autor desc limit 0,1 ");
	$row_autor=mysqli_fetch_array($query_autor);
    $id_autor=$row_autor['last'];
    }
    elseif ($idautor!="")
    {
    $id_autor =  $idautor;
    }

    // EDITORIAL
    if ($editoriale=="nueva")
    {
    // agrega la editorial primero
    $inserta_editorial = "INSERT INTO editorial (editorial, ciudad) VALUES ('$editorial', '$ciudad')";
    $einsertaeditorial = mysqli_query($conn, $inserta_editorial) or die ("Error al agregar el Editorial " . mysqli_error($conn));

    // obtengo inmediatamente el nuevo id de editorial
    $query_editorial=mysqli_query($conn,"select LAST_INSERT_ID(id_editorial) as lastid from editorial order by id_editorial desc limit 0,1 ");
	$row_editorial=mysqli_fetch_array($query_editorial);
    $id_editorial=$row_editorial['lastid'];
    }
    elseif ($editoriale!="")
    {
        $id_editorial = $ideditorial;
    }

    // INSERTAR EL LIBRO
    $query_libro1 = "INSERT INTO libro (id_libro, id_autor, titulo, disponibilidad, id_dewey, id_editorial, edicion, año)
    VALUES ('$idLibro', $id_autor, '$titulo', $disponibilidad, $dewey_clasificacion, $id_editorial, '$edicion', '$anio') ";
    
    $equery_libro1 = mysqli_query($conn, $query_libro1) or die ("Error al insertar el libro " . mysqli_error($conn));
    
    echo'<script type="text/javascript">
        alert("Libro Insertado");
        window.location.href="insertar_dos_tablas.php";
    </script>';
    
    
// echo "$idLibro $titulo $nautor $nombre_autor $apellido_autor $idautor $editoriale $ideditorial $edicion $año $ciudad  $disponibilidad";
// echo $titulo;
// echo $nautor;
// echo $nombre_autor;
// echo $apellido_autor;
// echo $idautor;
// echo $editoriale;
// echo $editorial;
// echo $ideditorial;
// echo $edicion;
// echo $año;
// echo $ciudad;
// echo $disponibilidad;
 ?>