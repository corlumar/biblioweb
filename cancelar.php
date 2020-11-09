<?php
include "conecta.php";

$idPrestamo = $_POST['id'];

$query_libro = "SELECT * FROM prestamo WHERE id_prestamo = '$idPrestamo'";
$equerylibro = mysqli_query($conn, $query_libro);
$rows_libros = mysqli_fetch_array($equerylibro);

$id_libro = $rows_libros['id_libro'];

$queryDisponible = "UPDATE libro  set disponibilidad = disponibilidad + 1 WHERE id_libro ='$id_libro'";
$equerydisponible = mysqli_query($conn, $queryDisponible) or die ("Error " . mysqli_error($conn));


$querycancela = "UPDATE prestamo  set estatus = 6 WHERE id_prestamo ='$idPrestamo'";
$equeryquerycancela = mysqli_query($conn, $querycancela) or die ("Error " . mysqli_error($conn));

echo "La petición se ha Cancelado";
?>