<?php
require_once 'conecta.php';

$clave = $_GET['clave'];

  $queryAlumno = $conn->query("SELECT * FROM alumno order by id_alumno");
  $queryCarrera = $conn->query("SELECT * FROM carrera order by id_carrera");
  
  $queryUniversitario = "SELECT * FROM universitario WHERE clave ='$clave' order by clave";

  $equeryUniversitario = mysqli_query($conn, $queryUniversitario);
  $registroUniversitarios  =mysqli_fetch_array($equeryUniversitario);
  
  $estatus = $registroUniversitarios['estatus'];
  $clave = $registroUniversitarios['clave'];
  $carrera = $registroUniversitarios['carrera'];
  $turno = $registroUniversitarios['turno'];
  $telefono = $registroUniversitarios['telefono'];
  $email = $registroUniversitarios['email'];
  

?>
<!DOCTYPE html>

<html lang="es">
  <head>
 
  <title>Universitarios </title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/loginn.css"> 
    <link rel="stylesheet" href="css/mis_estilos.css"> 
    <link rel="stylesheet" href="css/css-tablas.css"> 
   
  
   

</head>

<body>
 
    <div class="header">

      <h1>BIBLIOTECA</h1>
      <h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>
   </div>
   <?php include "navigation_bar.php";?>
  
  
<form  id="form-libro" action="guardar_cambiosAlumno.php" method="post" style="padding-bottom: 1%;">

        <h3 style="text-align: center; color:white">EDITAR  UNIVERSITARIO </h3>
        
         <input name="estatus" id="estatus" type="number" max="1" value ="<?php echo $estatus;?>" autocomplete="off" required>
         <div id="estatusActivo"></div>

        <input name="clave" id="clave" type="text" value ="<?php echo $clave;?>" autocomplete="off" required>
        
        <input name="carrera" type="text" value ="<?php echo $carrera;?>" required>
        
        <input name="turno" type="text" value ="<?php echo $turno;?>" required>
        
        <input name="telefono" type="text" value ="<?php echo $telefono;?>" required>
        
        <input name="email" type="text" value ="<?php echo $email;?>" required>
        
       

         <input name="insertar" id="insertar" type="submit" value="Guardar Cambios" class="button"> 
       
    </form>
    <br>
   
<script>
	
$(document).ready(function(){
     cargar_universitarios();
    function cargar_universitarios(){
        $.ajax({
            url: "detalle_universitarios.php",
            method: "POST",             
            success: function (data){
                $('#universitarios').fadeIn(1000).html(data);
            },
            dataType:'html'
        });
    }

     
              
            } 
            else
            {
                mensaje = "Proceso cancelado por el usuario";
                alert (mensaje)
            }
        
        })
        
       
            
})
</script>
  </br> </br> </br> </br>
<?php include "footer.php";?>
</body>
</html>