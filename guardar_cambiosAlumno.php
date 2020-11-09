<?php


include "conecta.php";
$estatus = $_POST['estatus'];
$clave = $_POST['clave'];
$carrera = $_POST['carrera'];
$turno = $_POST['turno'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];


 
    // EDITAR UNIVERSITARIO
    $query_universitario1 = "UPDATE universitario 
    INNER JOIN alumno  
    SET universitario.clave = alumno.clave
    estatus = $estatus,
    clave = $clave,
    carrera = $carrera,
    turno = $turno,
    telefono = $telefono,
    email = $email, ";
    
   //echo $query_universitario1;
    // exit;
    $equery_universitario1 = mysqli_query($conn, $query_universitario1) or die ("Error al modificar a el universitario " . mysqli_error($conn));
    
    echo'<script type="text/javascript">
        alert("Modificación Realizada");
        window.location.href="universitario.php";
    </script>';
    
  
 ?>