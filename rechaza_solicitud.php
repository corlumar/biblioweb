<?php
include "conecta.php";

$idPrestamo = $_POST['id'];
$motivo = $_POST['motivo'];

$query_libro = "SELECT * FROM prestamo WHERE id_prestamo = '$idPrestamo'";
$equerylibro = mysqli_query($conn, $query_libro);
$rows_libros = mysqli_fetch_array($equerylibro);

$id_libro = $rows_libros['id_libro'];

$query_u = "UPDATE prestamo SET estatus = 3, motivo_rechazo ='$motivo' WHERE id_prestamo = '$idPrestamo'";
$equeryu = mysqli_query($conn, $query_u) or die ("Error al buscar prestamo " .mysqli_error($conn));


$queryDisponible = "UPDATE libro SET disponibilidad = disponibilidad + 1 WHERE id_libro ='$id_libro'";


$equerydisponible = mysqli_query($conn, $queryDisponible);

echo "La petición se ha rechazado";
?>