<?php
include('conecta.php');


$dbhost	= "localhost:3306";
$dbuser	= "bibliot8_userfinal";
$dbpass	= "#A&jqwWDL=VJ";
$dbname	= "bibliot8_biblioteca";


try {
    $conn = new PDO('mysql:host=65.99.252.199;dbname=' . $dbname, $dbuser, $dbpass);
    $conn->query("set names utf8;");
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (Exception $e) {
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
} 

if(isset($_POST['clave']))
{
    $clave = $_POST['clave'];
    $SQL_READ_UPDATE = "SELECT * FROM universitario WHERE clave ";
    $RESULT_UPDATE = mysqli_query($conn,$SQL_READ_UPDATE);
    
    if(mysqli_num_rows($RESULT_UPDATE) == 1){
        $row = mysqli_fetch_array($RESULT_UPDATE);
    }
}



?>
<!DOCTYPE html>

<html lang="es">
  <head>
 
  <title>Alumnos </title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/loginn.css"> 
    <link rel="stylesheet" href="css/mis_estilos.css"> 
    <link rel="stylesheet" href="css/css-tablas1.css"> 
   
  
   

</head>

<body>
 
    <div class="header">

      <h1>BIBLIOTECA</h1>
      <h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>
   </div>
   <?php include "navigation_bar.php";?>
   <div align="center">
      <h3>Editar Alumno </h3>
   </div>
  
 <form method "POST" action = "guardar_cambiosAlumno.php?clave=<?php $row['clave']?>"></form>
    <div class="col-xs-9">
       
        <table >
            <thead>
            <tr>
                <th>ESTATUS</th>
                <th>ROL</th>
                <th>CLAVE</th>
                <th>NOMBRE(S)</th>
                <th>APELLIDO PAT</th>
                <th>APELLIDO MAT</th>
                <th>TELEFONO</th>
                <th>EMAIL</th>
                <th>ACCION</th>
                
              
            </tr>
            </thead>
            <tbody>
          
                <tr>
                   
                    <td><input type = "text" name="estatus" value="<?php echo $row->estatus?>"></td>
                    <td><input type = "text" name="id_rol" value="<?php echo $row->id_rol?>"></td>
                    <td><input type = "text" name="clave" value="<?php echo $row->clave?>"></td>
                    <td><input type = "text" name="nombre" value="<?php echo $row->nombre?>"></td>
                    <td><input type = "text" name="apellido_pat" value="<?php echo $row->apellido_pat?>"></td>
                    <td><input type = "text" name="apellido_mat" value="<?php echo $row->apellido_mat?>"></td>
                    <td><input type = "text" name="telefono" value="<?php echo $row->telefono?>"></td>
                    <td><input type = "text" name="email" value="<?php echo $row->email?>"></td>
                    
                    <td><input type = "submit"  value="Ejecutar"></td>
                  
                </tr>
           
            </tbody>
        </table>
        
    </div>

  </br> </br> </br> </br>
<?php include "footer.php";?>
</body>
</html>