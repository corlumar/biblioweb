<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');
session_start();
if(!isset($_SESSION['nombre']))
{
    header('Location: loginn.php');
}
 

require_once 'conecta.php';

$autor = $_POST['id_autor'];

  $queryAutor = $conn->query("SELECT * FROM autor order by id_autor");
  
  $equeryAutor = mysqli_query($conn, $queryAutor);
  $registroAutor  =mysqli_fetch_array($equeryAutor);
  
  $nombre = $registroAutor['nombre'];
  $apellido = $registroAutor['apellido'];
 
?>

<link rel="stylesheet" href="css/loginn.css">
<link rel="stylesheet" href="css/mis_estilos.css" rel="stylesheet">

<div class="header">	

  	<div class="container">

		<div class="row">

			<div class="col-sm-12">

			    

				<div align="center"> 

				<h1>BIBLIOTECA</h1><h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>

				</div>	

			</div>

			

		</div>

	</div>

</div>

<?php include "navigation_bar.php";?>
<br>
 
<form  id="form-autor" action="insertar_autor.php" method="post" style="padding-bottom: 1%;">

        <h3 style="text-align: center; color:white">INSERTAR NUEVO AUTOR</h3>
        
         <input name="nombre_autor" type="text" placeholder="Nombre del Autor" required>

        <input name="apellido_autor" type="text" placeholder="Apellido del Autor" required>	
        
        <input name="insertar" id="insertar" type="submit" value="Insertar Datos" class="button"> 
        </div>
       
    </form>
    <br>
    <?php include "footer.php";?>
    
    


