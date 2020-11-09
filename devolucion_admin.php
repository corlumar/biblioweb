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
 
session_start();
require_once 'conecta.php';

//////////////// VALORES INICIALES ///////////////////////
mysqli_set_charset($conn, "utf8");
 
///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////

 
$queryp = "SELECT devolucion.*, libro.id_autor, libro.titulo, autor.nombre_autor, autor.apellido_autor 
FROM devolucion, libro, autor 
WHERE devolucion.id_libro = libro.id_libro 
and libro.id_autor = autor.id_autor
AND estatus =1 ";

// echo $queryp;

$equeryp = mysqli_query($conn, $queryp) or die ("Ocurrio un error " . mysqli_error($conn));
?>
    <link rel="stylesheet" href="css/css-tablas.css">
    <link rel="stylesheet" href="css/loginn.css">

<link rel="stylesheet" href="css/mis_estilos.css">
    <div class="header">	
    <div class="row">

        <div class="col-sm-12">

            <div align="center"> 

            <h1>BIBLIOTECA</h1><h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>

            </div>	

        </div>

    </div>
    </div>
        
   
    <div id="navigation">
        <p> Bienvenido: <?php echo $_SESSION['nombre'] ?> | <a  href="cerrar_Sesion.php"> Cerrar Sesión</a> | <a href="javascript:history.back()"> Volver Atrás</a> | <a href="index.php"> Inicio</a></p>
    </div>

     <div id="midiv" style="padding:5px">
        <p style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:22px; text-align:center">RELACIÓN DE DEVOLUCIONES </p>
    </div>
    <hr>
    <table>
        <thead>
            <tr>
               
                <th>ISBN</th>	
                <th>TITULO</th>
                <th>AUTOR</th>	
                <th>FECHA DEVOLUCIÓN</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr> 
        </thead>
   
    <?php 
	while($filaPrestamo= mysqli_fetch_array($equeryp))
	{
      $idDevolucion = $filaPrestamo['id_devolucion'];
      ?>
     <tbody>
		<tr> 
		    
            <td style="text-align: center;"><?php echo $filaPrestamo['id_libro'];?></td>
            <td style="text-align: center;"><?php echo $filaPrestamo['titulo'];?></td>
            <td style="text-align: center;"><?php echo $filaPrestamo['autor'] . " " . $filaPrestamo['apellido_autor'];?></td>
			<td style="text-align: center;"><?php echo $filaPrestamo['fecha_devolucion'];?></td>
            <td style="text-align: center;">Entregando..</td>
 			<td>
                  <a style="text-decoration: none; color:teal" href="#" class="prestalibro recibir" id='<?php echo $idDevolucion;?>'>Recibir</a>
            </td>                              
		 </tr>
 		
    <?php } ?>
    </tbody>
    </table>
    <br>
  <?php include "footer.php";?>

 
  <script
        src="https://code.jquery.com/jquery-3.5.0.js"
        integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
        crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function(){
            $(document).on('click', '.recibir', function(){

                var idDev = $(this).attr("id"); 
                var url = "recibe_libro.php";

                $.ajax({                        
                type: "POST",                 
                url: url,                     
                data: {idDev:idDev}, 
                success: function(data)             
                {   
                    alert ("Proceso completado de forma correcta");
                    window.location.href = "devolucion_admin.php";
                }
                }); 
            })
            $(document).on('click', '.rechaza', function(){
                alert("Rechaza Solicitud")
            })
        })
    </script> 