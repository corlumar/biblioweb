<?php


include "conecta.php";
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

 
 

    // INSERTAR EL LIBRO
    $query_libro1 = "UPDATE libro SET 
    id_autor = $id_autor,
    titulo = '$titulo',
    disponibilidad = $disponibilidad,
    id_dewey = $dewey_clasificacion,
    id_editorial = $id_editorial,
    edicion ='$edicion',
    año = '$anio'
    WHERE id_libro = '$idLibro'";
    
    // echo $query_libro1;
    // exit;
    $equery_libro1 = mysqli_query($conn, $query_libro1) or die ("Error al modificar el libro " . mysqli_error($conn));
    
    echo'<script type="text/javascript">
        alert("Modificación Realizada");
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