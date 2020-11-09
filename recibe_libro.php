<?php
include "conecta.php";

$idDevolucion = $_POST['idDev'];

$query = "SELECT * FROM devolucion WHERE id_devolucion = '$idDevolucion'";

$equery = mysqli_query($conn, $query) or die ("Error al buscar datos de devolucion  " . mysqli_error($conexion));
$rows = mysqli_fetch_array($equery);

$idPrestamo = $rows['id_prestamo'];
$id_libro  = $rows['id_libro'];

 
$updateDisponibilidad = "UPDATE disponibilidad SET disponibilidad = disponibilidad + 1 WHERE id_libro = '$id_libro'";
$edisponiblidad = mysqli_query($conn, $updateDisponibilidad) or die ("Error al actualizar la disponiblidad " . mysqli_error($conn));

$devolucion_u = "UPDATE devolucion SET estatus = 2 WHERE id_devolucion = '$idDevolucion'";
$edevulucionu = mysqli_query($conn, $devolucion_u) or die ("Error al devolver libro " . mysqli_error($conn));

$prestamo_u = "UPDATE prestamo SET estatus = 4 WHERE id_prestamo = '$idPrestamo'";
$eprestamou = mysqli_query($conn, $prestamo_u) or die ("Error al actualiza libro en prestamo " . mysqli_error($conn));
 

?>