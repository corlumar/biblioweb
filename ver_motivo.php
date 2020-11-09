<?php
include "conecta.php";

$idPrestamo = $_POST['id'];


$query_u = "SELECT * FROM prestamo  WHERE id_prestamo = '$idPrestamo'";
// echo $query_u;
// exit;
$equeryu = mysqli_query($conn, $query_u) or die ("Error al buscar prestamo " .mysqli_error($conn));

$row = mysqli_fetch_array($equeryu);
$motivo = $row['motivo_rechazo'];

echo $motivo;
exit;
?>