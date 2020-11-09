<?php
include "conecta.php";

$codigolibro = $_POST['code_libro'];
$alumno = $_POST['alumno'];
$fecha = $_POST['fecha'];
$fechad = $_POST['fechad'];

$query_check = "SELECT * FROM prestamo WHERE id_libro = '$codigolibro' 
AND clave ='$alumno'
AND ((fecha_prestamo between '$fecha' AND '$fechad') 
OR (fecha_devolucion between '$fecha' AND '$fechad'))";

 

$equerycheck = mysqli_query($conn, $query_check) or die ("Ha ocurrido un Error " . mysqli_error($conexion));

$existe = mysqli_num_rows($equerycheck);

 
if ($existe >0 ){

    echo'<script type="text/javascript">
    alert("¡Cuidado! Ya tiene este libro reservado, no puede realizar esta solicitud");
    window.location.href="rol_alumno.php";
    </script>';
}else{

$guarda = "INSERT INTO prestamo (clave, fecha_prestamo, fecha_devolucion, id_libro) VALUES ('$alumno','$fecha','$fechad','$codigolibro')";
$ejecutar = mysqli_query($conn, $guarda);

$update = "UPDATE libro SET disponibilidad = disponibilidad - 1 WHERE id_libro = '$codigolibro'";

$ejecuta_u = mysqli_query($conn, $update) or die ("Ocurrio un error " . mysqli_error($conn));


echo'<script type="text/javascript">
    alert("Préstamo Realizado");
    window.location.href="rol_alumno.php";
    </script>';
}
?>