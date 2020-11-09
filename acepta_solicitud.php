<?php
include "conecta.php";

$idPrestamo = $_POST['id'];

$query_u = "UPDATE prestamo SET estatus = 2 WHERE id_prestamo = '$idPrestamo'";
$equeryu = mysqli_query($conn, $query_u) or die ("Errr al buscar prestamo " .mysqli_error($conn));
echo "Se ha aceptado la solicitud del préstamo";
?>