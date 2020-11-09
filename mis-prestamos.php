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

$id = $_GET['id'];
$query = "SELECT nombre FROM users WHERE id_users = '$id'";
// echo $query;
$equery =  mysqli_query($conn, $query);
$row = mysqli_fetch_array($equery);
$usuario = $row['nombre'];

// echo $usuario;
//  exit;
//////////////// VALORES INICIALES ///////////////////////
mysqli_set_charset($conn, "utf8");
 
///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if($_GET['id']!=''){


$id = $_GET['id'];

 
$query = "SELECT * FROM universitario WHERE id_users ='$id'" or die ("Error");
// echo $query;

$equery = mysqli_query ($conn, $query);
$row = mysqli_fetch_array($equery);
$clave = $row['clave']; 

 
    $queryp = "SELECT prestamo.*, libro.id_autor, libro.titulo, autor.nombre_autor, autor.apellido_autor 
    FROM prestamo, libro, autor 
    WHERE prestamo.id_libro = libro.id_libro 
    and libro.id_autor = autor.id_autor 
    AND prestamo.clave = '$clave'";

//   echo $queryp;
    $equeryp = mysqli_query($conn, $queryp) or die ("Ocurrio un error " . mysqli_error($conn));
    ?>
    <link rel="stylesheet" href="css/css-tablas.css">
    <link rel="stylesheet" href="css/loginn.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
        <p> Bienvenido: <?php echo $usuario; ?> | <a  href="cerrar_Sesion.php"> Cerrar Sesión</a> | <a href="javascript:history.back()"> Volver Atrás</a> | <a href="index.php"> Inicio</a></p>
    </div>

<div class="w3-center w3-flat-pumpkin">
<div class="w3-bar">
    <br/>
 <div class="center">
	<a href="index.php" class="w3-button w3-red">Inicio</a>

	<a href="presentacion1.php" class="w3-button w3-red">Presentación</a>

	<a href="prestamo1.php?id=<?php echo $id;?>" class="w3-button w3-red">Solicitar Libro</a>

	<a href="mis-prestamos.php?id=<?php echo $id;?>"class="w3-button w3-red">Mis Préstamos</a>

	<a href="colecciones.php" class="w3-button w3-red">Colecciones</a>

    <a href="https://upch.mx/#" class="w3-button w3-red">Bibliotecas</a>

	<a href="https://upch.mx/quienes-somos" class="w3-button w3-red">Acerca de Nosotros</a>
</div>
</div>
</div>
     <div id="midiv" style="padding:5px">
        <p style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:22px; text-align:center">HISTORIAL DE ACCIONES </p>
    </div>
    <hr>
    <table>
        <thead>
            <tr>
                <th>No. PRESTAMO</th>
                <th>ISBN</th>	
                <th>TITULO</th>
                <th>AUTOR</th>	
                <th>FECHA PRESTAMO</th>	
                <th>FECHA DEVOLUCIÓN</th>
                <th>ESTATUS</th>
                <th>ACCIONES</th>
            </tr> 
        </thead>
   
    <?php 
	while($filaPrestamo= mysqli_fetch_array($equeryp))
	{
        $idPrestamo = $filaPrestamo['id_prestamo'];
      ?>
     <tbody>
		<tr> 
	    	<td style="text-align: center;"><?php echo $idPrestamo;?></td>
            <td style="text-align: center;"><?php echo $filaPrestamo['id_libro'];?></td>
            <td style="text-align: center;"><?php echo $filaPrestamo['titulo'];?></td>
            <td style="text-align: center;"><?php echo $filaPrestamo['autor'] . " " . $filaPrestamo['apellido_autor'];?></td>
			<td style="text-align: center;"><?php echo $filaPrestamo['fecha_prestamo'];?></td>
			<td style="text-align: center;"><?php echo $filaPrestamo['fecha_devolucion'];?></td>
            <td style="text-align: center;">
            <?php 
                if ($filaPrestamo['estatus']==1){
                echo "Procesando";
                }
                if ($filaPrestamo['estatus']==2){
                echo "En Uso";
                }
                if ($filaPrestamo['estatus']==3){
                echo "Rechazado";
                }
                if ($filaPrestamo['estatus']==4){
                    echo "Entregado";
                }
                if ($filaPrestamo['estatus']==5){
                    echo "Entregando...";
                }
                 if ($filaPrestamo['estatus']==6){
                    echo "Cancelado";
                }
                ?></td>
 			<td>
 			    <?php 
                if ($filaPrestamo['estatus']==1){?>
                <a style="text-decoration: none; color:teal" href="#" class="prestalibro cancelar" id='<?php echo $idPrestamo;?>'>Cancelar</a>    
                <?php } 

                if ($filaPrestamo['estatus']==2){?>
                <a style="text-decoration: none; color:teal" href="#" class="prestalibro devolver" id='<?php echo $idPrestamo;?>'>Devolver</a>
                <?php }  

                if ($filaPrestamo['estatus']==3){?>
                   <a style="text-decoration: none; color:teal" href="#" class="prestalibro vermotivo" id='<?php echo $idPrestamo;?>'>Ver Motivo</a>
                <?php  } ?>
            </td>
                 
		 </tr>
 		
    <?php } ?>
    </tbody>
    </table>
    <br>
     <?php include "footer.php";?>
    <?php } ?>

 
    <script
        src="https://code.jquery.com/jquery-3.5.0.js"
        integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
        crossorigin="anonymous">
    </script>
     <script>
        $(document).ready(function(){
            $(document).on('click', '.devolver', function(){

                var id = $(this).attr("id");   
                // alert(id)
                // return             
                var url = "devuelve_libro.php";

                $.ajax({                        
                type: "POST",                 
                url: url,                     
                data: {id:id}, 
                success: function(data)             
                {   
                    //alert(data)
                    // if (data === "exito"){
                    alert ("Se ha enviado la notificación de devolución correctamente");
                    location.reload();
                    // }
  
                }
                }); 
            })
            $(document).on('click', '.vermotivo', function(){
                var id = $(this).attr("id");   
                
                var url = "ver_motivo.php";

                $.ajax({                        
                    type: "POST",                 
                    url: url,                     
                    data: {id:id}, 
                    success: function(resp)             
                    {   
                        alert(resp)
                        
                       
                    }
                }); 
            })
            
            $(document).on('click', '.cancelar', function(){
                var id = $(this).attr("id");   
                
                var url = "cancelar.php";

                $.ajax({                        
                    type: "POST",                 
                    url: url,                     
                    data: {id:id}, 
                    success: function(resp)             
                    {   
                        alert(resp)
                        location.reload();
                    }
                }); 
            })
                
        })
    </script> 