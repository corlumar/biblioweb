.,<?php
require_once 'conecta.php';


$nombre_autor = $_POST['nombre_autor'];
$apellido_autor = $_POST['apellido_autor'];

   
    
    // INSERTAR EL AUTOR
  //  $query_autor = "INSERT INTO autor(nombre_autor', 'apellido_autor') VALUES  ('$nombre_autor', '$apellido_autor') ";
    $inserta_autor = "INSERT INTO autor (nombre_autor, apellido_autor) VALUES ('$nombre_autor', '$apellido_autor')";
    $einsertaautor = mysqli_query($conn, $inserta_autor) or die ("Error al agregar el autor " . mysqli_error($conn));
    echo "se ingreso1";
   
   if (mysqli_query($conn, $query_autor)) {
     echo "New record created successfully";
}

else {
     echo "Error localizado en Insertar_autor.php: " . $query_autor . "<br>" . mysqli_error($conn);
}
    
    
    
    echo'<script type="text/javascript">
        alert("Autor Insertado");
        window.location.href="autores.php";
    </script>';
    

 ?>