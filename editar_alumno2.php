<?php
require_once 'conecta.php';

 if($_POST)
      {
         $queryUpdate = "UPDATE $universitario SET clave = '".$_POST['clave']."',
                        estatus = '".$_POST['estatus']."'
                        id_rol = '".$_POST['id_rol']."'
                        carrera = '".$_POST['carrera']."'
                        turno = '".$_POST['turno']."'
                        telefono = '".$_POST['telefono']."'
                        email = '".$_POST['email']."'
                        
                        WHERE ID = ".$_POST['clave'].";";
 
         $resultUpdate = mysqli_query($link, $queryUpdate); 
 
         if($resultUpdate)
         {
            echo "<strong>El registro Clave ".$_POST['clave']." con exito</strong>. <br>";
         }
         else
         {
            echo "No se pudo actualizar el registro. <br>";
         }
 
      }
 
      $query = "SELECT universitario.*, alumno.*, users.*
    FROM universitario, alumno, users 
    WHERE universitario.clave = alumno.clave
    and universitario.id_users = users.id_users";
 
      $result = mysqli_query($conn, $query); 
 
      ?>
 
      <table>
         <tr>
            <td>Estatus</td>
            <td>Clave</td>
            <td>Carrera</td>
            <td>Turno</td>
            <td>Teléfono</td>
            <td>Email</td>
         <tr>
 
      <?php
 
      while($row = mysqli_fetch_array($result))
      { 
         echo "<tr>";
         echo "<td>";
         echo $row["estatus"];
         echo "</td>";
         echo "<td>";
         echo $row["clave"];
        
         echo "<tr>";
         echo "<td>";
         echo $row["carrera"];
        
         echo "<td>";
         echo $row["turno"];
        
         echo "<tr>";
         echo "<td>";
         echo $row["telefono"];
         
         echo "<td>";
         echo $row["email"];
         echo "</td>";
         echo "<td>";
         echo "<a href=\"?id=".$row["clave"]."\">Actualizar</a>";
         echo "</td>";
         echo "</tr>";
 
      } 
 
      mysqli_free_result($result); 
 
      ?>
 
      </table>
      <hr>
 
      <?php
      if($_GET)
      {
         $querySelectByID = "SELECT universitario.*, alumno.*, users.*
    FROM universitario, alumno, users WHERE clave = ".$_GET['clave'].";";
 
         $resultSelectByID = mysqli_query($conn, $querySelectByID); 
 
         $rowSelectByID = mysqli_fetch_array($resultSelectByID);
      ?>
 
      <form action="" method="post">
         <input type="hidden" value="<?=$rowSelectByID['clave'];?>" name="idForm">
         Estatus: <input type="text" name="estatus" value="<?=$rowSelectByID['estatus'];?>"> <br> <br>
         Clave: <input type="text" name="clave" value="<?=$rowSelectByID['clave'];?>"> <br> <br>
         Carrera: <input type="text" name="carrera" value="<?=$rowSelectByID['carrera'];?>"> <br> <br>
         Turno: <input type="text" name="turno" value="<?=$rowSelectByID['turno'];?>"> <br> <br>
         Telefono: <input type="text" name="telefono" value="<?=$rowSelectByID['telefono'];?>"> <br> <br>
         Email: <input type="text" name="email" value="<?=$rowSelectByID['email'];?>"> <br> <br>
         <input type="submit" value="Guardar">
      </form>
 
      <?php
      }
      mysqli_close($conn);
      ?>
      </body> 
?>
<!--
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
    <?  echo "resultado  . ('$clave')"; ?>
   
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
  </br> </br> </br> </br> -->
<?php include "footer.php";?>
</body>
</html>