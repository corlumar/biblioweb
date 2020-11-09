<?php
include "conecta.php";

$idLibro = $_POST['id'];

$query = "SELECT * FROM libro WHERE id_libro = '$idLibro'";
$equery = mysqli_query ($conn, $query) or die ("Error ". mysqli_error($conn));
$rows = mysqli_num_rows($equery);

if ($rows>0){
    echo "existe";
}else{
    echo "ok";
}
?>