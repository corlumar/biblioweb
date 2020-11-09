<?php
require_once 'conecta.php';


$editorial = $_POST['editorial'];
$ciudad = $_POST['ciudad'];

   
    
    // INSERTAR LA EDITORIAL
    
    $inserta_editorial = "INSERT INTO editorial (editorial, ciudad) VALUES ('$editorial', '$ciudad')";
    $einsertaeditorial = mysqli_query($conn, $inserta_editorial) or die ("Error al agregar la editorial " . mysqli_error($conn));
   
   if (mysqli_query($conn, $sql)) {
     echo "New record created successfully";
}

else {
     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    
    
    
    echo'<script type="text/javascript">
        alert("Editorial Insertada");
        window.location.href="editorial.php";
    </script>';
    

 ?>