<?php
include "conecta.php";

$idPrestamo = $_POST['id'];

$libro = "SELECT * FROM prestamo WHERE id_prestamo = '$idPrestamo'";
$elibro = mysqli_query($conn, $libro) or die ("Error al localizar datos del libro " . mysqli_error($conn));
$row = mysqli_fetch_array($elibro);
$id_libro = $row['id_libro'];
$clave = $row['clave'];
$fecha = date("Y-m-d");

$updatePrestamo = "UPDATE prestamo SET estatus = 5 WHERE id_prestamo = '$idPrestamo'";
$eupdatePrestamo = mysqli_query($conn, $updatePrestamo) or die ("Error al actualizar prestamos " . mysqli_error($conn));


$query = "INSERT INTO devolucion (clave, fecha_devolucion, diferencia, id_libro, estatus, id_prestamo)
VALUES ('$clave', '$fecha',0, '$id_libro',1,$idPrestamo)";
$equery = mysqli_query($conn, $query) or die ("Error al insertar en devolucion " . mysqli_error($conn));

echo "Se ha envíado la notificación de devolución correctamente";
// header("Location: mis-prestamos.php");

?>