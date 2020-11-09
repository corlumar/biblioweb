<?php
include "conecta.php";
$idLibro = $_POST['estatus'];

$query_update = "UPDATE FROM libro WHERE id_libro = '$idLibro'";
$equeryupdate = mysqli_query($conn, $query_update) or die ("Error al actualizar el libro");

echo "El libro se elimino de forma correcta";
?>