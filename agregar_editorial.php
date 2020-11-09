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

$autor = $_POST['id_editoral'];

  $queryrEditorial = $conn->query("SELECT * FROM editorial order by id_editorial");
  
  $equeryEditorial = mysqli_query($conn, $queryEditorial);
  $registroEditorial  =mysqli_fetch_array($equeryEditorial);
  
  $editorial = $registroEditorial['editorial'];
  $ciudad = $registroEditorial['ciudad'];
 
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
 
<form  id="form-editorial" action="insertar_editorial.php" method="post" style="padding-bottom: 1%;">

        <h3 style="text-align: center; color:white">INSERTAR NUEVA EDITORIAL</h3>
        
         <input name="editorial" type="text" placeholder="Nombre de la Editorial" required>

        <input name="ciudad" type="text" placeholder="Ciudad de la Editorial" required>	
        
        <input name="insertar" id="insertar" type="submit" value="Insertar Datos" class="button"> 
        </div>
       
    </form>
    <br>
    <?php include "footer.php";?>

