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
  $queryAutor = $conn->query("SELECT * FROM autor order by id_autor");

    $queryEditorial = $conn->query("SELECT * FROM editorial order by id_editorial");
?>
<html lang="es">

<head>

	<title>INSERTAR DATOS LIBROS</title>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

	<!-- <link rel="stylesheet" href="css/mis_estilos.css" rel="stylesheet"> -->
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="css/css-tablas.css">
	<link rel="stylesheet" href="css/nuevo-libro.css">
	<script languaje="javascript" src="js/jquery.js"></script>
	
    <link rel="stylesheet" href="css/loginn.css"> 

	<link rel="stylesheet" href="css/mis_estilos.css"> 

	<link rel="stylesheet" href="css/botones2.css">  
	
	<script languaje="javascript" src="js/nobackbutton.js"></script>
 


</head>

<body>


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

<div class="w3-center w3-flat-pumpkin">
<div class="w3-bar">
    <br/>
  
<div class="dropdown">
  <button class="w3-button w3-red">Consultar</button>
  <div class="dropdown-content">
    <a style="font-weight:bold;" href="por_alumno.php">Por Universitario</a>
    <a style="font-weight:bold;"href="por_titulo.php">Por Titulo</a>
    <a style="font-weight:bold;"href="por_autor.php">Por Autor</a>
    <a style="font-weight:bold;"href="por_isbn.php">Por ISBN</a>
  
  </div>
</div>


  <a href="insertar_dos_tablas.php" class="w3-button w3-red">Agregar Libro</a>
  
  <a href="agregar_autor.php" class="w3-button w3-red">Nuevo Autor</a>
  
  <a href="agregar_editorial.php" class="w3-button w3-red">Nueva Editorial</a>
  
<p  style="text-align:center; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;font-size: 24px; color: #0b1588; border-bottom:1px solid gray">GESTIÓN DE LIBROS</p3>
            <br>
                <div>

            <div style="margin-bottom:25px;">
            <!-- <a href="#openModal">Lanzar el modal</a> -->

                    <!--<a href="#openModal" class="enlaceboton">Nuevo Libro</a>-->
                     <a href="libro-nuevo2.php" class="enlaceboton">Nuevo Libro</a>

                    
            </div>
<div id="libros"></div>
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
     cargar_libros();
    function cargar_libros(){
        $.ajax({
            url: "detalle_libros.php",
            method: "POST",             
            success: function (data){
                $('#libros').fadeIn(1000).html(data);
            },
            dataType:'html'
        });
    }

     // guardar guardaredicion
     $(document).on('click', '#insertar', function(){
            
            var url = "insertar_libro.php";
            $.ajax({                        
            type: "POST",                 
            url: url,                     
            data: $("#form-libro").serialize(), 
            success: function(data)             
            {   
                alert (data);
                 
                // cargar_libros();   
            }
            });                  
            
        });
        $(document).on('click', '.eliminaLibro', function(){
            // alert("Actualizando...")
            var id = $(this).attr("estatus"); 
            var opcion = confirm("Esta seguro de actualizar el libro " + id);
            if (opcion == true) 
            {
                var url = "elimina_libro.php";
                    $.ajax({                        
                    type: "POST",                 
                    url: url,                     
                    data: {estatus:estatus}, 
                    success: function(data)             
                    {   
                        alert (data);  
                        cargar_libros();                         
                    
                    }
                });   
            } 
            else
            {
                mensaje = "Proceso cancelado por el usuario";
                alert (mensaje)
            }
        
        })

            
})
</script>



