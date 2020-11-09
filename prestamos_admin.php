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
?>
<!DOCTYPE html>

<html lang="es">

<head>

	<title>Busqueda Acervo</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link rel="stylesheet" href="css/loginn.css"> 

	<link rel="stylesheet" href="css/mis_estilos.css"> 

	<link rel="stylesheet" href="css/botones.css">  

    <link rel="stylesheet" href="css/css-tablas.css">
</head>

<body>
    <?php

    require_once 'conecta.php';

    //////////////// VALORES INICIALES ///////////////////////
    mysqli_set_charset($conn, "utf8");
    
    ///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////

    
    $queryp = "SELECT prestamo.*, libro.id_autor, libro.titulo, autor.nombre_autor, autor.apellido_autor 
    FROM prestamo, libro, autor 
    WHERE prestamo.id_libro = libro.id_libro 
    and libro.id_autor = autor.id_autor ";


    $equeryp = mysqli_query($conn, $queryp) or die ("Ocurrio un error " . mysqli_error($conn));
    ?>



    <div class="header">	
        <div class="row">

            <div class="col-sm-12">

                <div align="center"> 

                    <h1>BIBLIOTECA</h1><h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>

                </div>	

            </div>

        </div>
    </div>
    
    <?php 
        include "navigation_bar.php";
    ?>
    
     <div id="midiv" style="padding:5px">
        <p style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:22px; text-align:center">RELACIÓN DE PRÉSTAMOS </p>
    </div>

    <hr>
    <table>
        <thead>
            <tr>
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
            <td style="text-align: center;"><?php echo $filaPrestamo['id_libro'];?></td>
            <td style="text-align: center;"><?php echo $filaPrestamo['titulo'];?></td>
            <td style="text-align: center;"><?php echo $filaPrestamo['autor'] . " " . $filaPrestamo['apellido_autor'];?></td>
			<td style="text-align: center;"><?php echo $filaPrestamo['fecha_prestamo'];?></td>
			<td style="text-align: center;"><?php echo $filaPrestamo['fecha_devolucion'];?></td>
            <td style="text-align: center;"><?php 
                if ($filaPrestamo['estatus']==1){
                echo "Solicitando";
                }
                if ($filaPrestamo['estatus']==2){
                echo "Prestado";
                }
                if ($filaPrestamo['estatus']==3){
                echo "Rechazado";
                }
                if ($filaPrestamo['estatus']==4){
                    echo "Entregado";
                }
                 ?></td>
 			<td>
                 <?php 
                if ($filaPrestamo['estatus']==1){?>
                <a style="text-decoration: none; color:teal" href="#" class="prestalibro envia" id='<?php echo $idPrestamo;?>'><img src="images/aceptar.png" width="22" height="22" title="Validar"></a> <a style="text-decoration: none; color:teal" href="" class="prestalibro rechaza" id='<?php echo $idPrestamo;?>'><img src="images/cancelar.png" width="22" height="22" title="Validar"></a></td>
                <?php } 

                if ($filaPrestamo['estatus']==2){?>
                 <a style="text-decoration: none; color:teal" href="" class="prestalibro" id='<?php echo $id;?>'></a></td>
                <?php }  

                if ($filaPrestamo['estatus']==3){?>
                <?php echo "";?></td>
                
                <?php  } ?>
                 
		 </tr>
 		
    <?php } ?>
    </tbody>
    </table>
    <br>
  <?php include "footer.php";?>
</body>
</html>
    <script
        src="https://code.jquery.com/jquery-3.5.0.js"
        integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
        crossorigin="anonymous">
    </script>
     <script>
     
     
        $(document).ready(function(){
            $(document).on('click', '.envia', function(){

                var id = $(this).attr("id");                
                var url = "acepta_solicitud.php";

                $.ajax({                        
                type: "POST",                 
                url: url,                     
                data: {id:id}, 
                success: function(data)             
                {   
                     alert (data);
                     location.reload();
  
                }
                }); 
            })
            $(document).on('click', '.rechaza', function(){
                //alert("Rechaza Solicitud")
                var motivo = ''
                var id = $(this).attr("id");       
                motivo = prompt("Escriba el motivo de rechazo ", "Exceso de prestamos");  
                
                  if (motivo != '') {
                  
                        
                    var url = "rechaza_solicitud.php";
                    
                    $.ajax({                        
                        type: "POST",                 
                        url: url,                     
                        data: {id:id, motivo:motivo}, 
                        success: function(data)             
                        {   
                             alert (data);
                             location.reload();
          
                        }
                    });
                  }
                  if (motivo===''){
                    alert("No escribió ningún motivo ");
                    // location.reload();
                  }
            })
        })
        
         $(document).ready(function(){
    $('#data').after('<div id="midiv"></div>');
    var rowsShown = 3;
    var rowsTotal = $('#data tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#data tbody tr').hide();
    $('#data tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function(){

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
        css('display','table-row').animate({opacity:1}, 300);
    });
    </script>           