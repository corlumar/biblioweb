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

$idLibro = $_GET['idLibro'];

  $queryAutor = $conn->query("SELECT * FROM autor order by id_autor");
  $queryEditorial = $conn->query("SELECT * FROM editorial order by id_editorial");
  $queryDewey = $conn->query("SELECT * FROM clasificaDewey order by id_dewey");
  
  $queryLibros = "SELECT * FROM libro WHERE id_libro ='$idLibro' order by id_libro";

  $equeryLibro = mysqli_query($conn, $queryLibros);
  $registroLibros  =mysqli_fetch_array($equeryLibro);
  
  $estatus = $registroLibros['estatus'];
  $anio = $registroLibros['año'];
  $titulo = $registroLibros['titulo'];
  $disponibilidad = $registroLibros['disponibilidad'];
  $edicion = $registroLibros['edicion'];
  $id_autor = $registroLibros['id_autor'];
  $id_editorial = $registroLibros['id_editorial'];
  $id_dewey = $registroLibros['id_dewey'];
  
  $autor2 ="SELECT * FROM autor WHERE id_autor ='$id_autor'";
   $eautor2 = mysqli_query ($conn, $autor2);
  $row_autor = mysqli_fetch_array($eautor2);
  $nombre_autor = $row_autor['nombre_autor'] . " " . $row_autor['apellido_autor'];
  
  $editorial2 ="SELECT * FROM editorial WHERE id_editorial ='$id_editorial'";
  $eeditorial2 = mysqli_query ($conn, $editorial2);
  $row_editorial2 = mysqli_fetch_array($eeditorial2);
  $nombre_editorial = $row_editorial2['editorial'];
  
  $categoria ="SELECT * FROM clasificaDewey WHERE id_dewey ='$id_dewey'";
  $ecategoria = mysqli_query ($conn, $categoria);
  $row_categoria = mysqli_fetch_array($ecategoria);
  $nombre_categoria = $row_categoria['dewey_clasificacion'];
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
 
<form  id="form-libro" action="guardar_cambios.php" method="post" style="padding-bottom: 1%;">

        <h3 style="text-align: center; color:white">EDITAR  LIBRO </h3>
        
         <input name="estatus" id="estatus" type="number" max="1" value ="<?php echo $estatus;?>" autocomplete="off" required>
         <div id="estatusActivo"></div>

        <input name="id_libro" id="id_libro" type="text" value ="<?php echo $idLibro;?>" autocomplete="off" required>
        <div id="existeLibro"></div>


        <input name="titulo" type="text" value ="<?php echo $titulo;?>" required>

        
        <select name="nautor" id="nautor" class="select-css">
        <option selected="true" value="<?php echo $id_autor;?> "><?php echo $nombre_autor;?> </option>
            <?php
            while($registroAutor  = $queryAutor->fetch_array( MYSQLI_BOTH)){ ?>
            <option value="<?php echo $registroAutor['id_autor'];?>"><?php echo $registroAutor['nombre_autor'] . " " .  $registroAutor['apellido_autor'];?></option>
            <?php } ?>
           
        </select>
        <br>
        
        <div id="dAutorexiste">
            <input name="idautor" id="idautor" type="text">
        </div>
        
        <select name="editoriale" id="editoriale" class="select-css">
        <option selected="true" value="<?php echo $id_editorial;?> "><?php echo $nombre_editorial;?> </option>
            <?php
            while($registroEditorial  = $queryEditorial->fetch_array( MYSQLI_BOTH)){ ?>
            <option value="<?php echo $registroEditorial['id_editorial'];?>"><?php echo $registroEditorial['editorial'];?></option>
            <?php } ?>
            
        </select>

        <div id="editorialExiste">
            <input name="ideditorial" id="ideditorial" type="text" >
        </div>

        
        <input name="edicion" type="number" min="1" value ="<?php echo $edicion;?>" required>
        
        
          <select name="clasifica" id="clasifica" class="select-css">
            <option selected="true" value="<?php echo $id_dewey;?>"><?php echo $nombre_categoria;?></option>
                <?php
                while($registroClasifica  = $queryDewey->fetch_array( MYSQLI_BOTH)){ ?>
                <option value="<?php echo $registroClasifica['id_dewey'];?>"><?php echo $registroClasifica['dewey_clasificacion'];?></option>
                <?php } ?>
                 
            </select>


        <input name="anio" type="number" min="1500" value = '<?php echo $anio;?>' required>

        <input name="disponibilidad" type="number" min="1" value ="<?php echo $disponibilidad;?>" required>

         <input name="insertar" id="insertar" type="submit" value="Guardar Cambios" class="button"> 
        <!--<button id="insertar" name="insertar" class="button">Insertar</button>-->
    </form>
    <br>
    <?php include "footer.php";?>
    <script
    src="https://code.jquery.com/jquery-3.5.0.js"
    integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc="
    crossorigin="anonymous">
    </script>

<script>
        $(document).ready(function(){
            // $('#insertar').attr("disabled", true);
            $("#dAutorNuevo").hide()
            $("#dAutorexiste").hide()
            $("#editorialNuevo").hide()
            $("#editorialExiste").hide()
            $(document).on('change', '#nautor', function(){
                var cont = $('select[id=nautor]').val()
                // alert(cont);
                 $('#cont').val($(this).val());
                // alert (cont)
                if (cont==='nuevo'){
                    $("#dAutorNuevo").show()
                    $("#dAutorexiste").hide()
					$("#idautor").val('');
                }else{
                   
					// $("#dAutorexiste").show()
					$("#nombre_autor").val("")
					$("#dAutorNuevo").hide()
					$("#apellido_autor").val("")
                    $("#idautor").val(cont)
                }
            });

            $(document).on('change', '#editoriale', function(){
                var conted= $('select[id=editoriale]').val();
                
                if (conted=='nueva'){
                    $("#editorialNuevo").show()
                    $("#editorialExiste").hide()
					$("#ideditorial").val("")
                }else{
                    $("#editorialNuevo").hide()
                    $("#editorial").val("")
                    $("#ciudad").val("")
                    $("#ideditorial").val(conted)
                }
            });
        })
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
    //  $(document).on('click', '#insertar', function(){
            
    //         var url = "insertar_libro.php";
    //         $.ajax({                        
    //         type: "POST",                 
    //         url: url,                     
    //         data: $("#form-libro").serialize(), 
    //         success: function(data)             
    //         {   
    //             alert (data);
                 
    //             // cargar_libros();   
    //         }
    //         });                  
            
    //     });
        $(document).on('click', '.eliminaLibro', function(){
            // alert("Eliminando...")
            var id = $(this).attr("id"); 
            var opcion = confirm("Esta seguro de eliminar el libro " + id);
            if (opcion == true) 
            {
                var url = "elimina_libro.php";
                    $.ajax({                        
                    type: "POST",                 
                    url: url,                     
                    data: {id:id}, 
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
        
        // $(document).on('keyup', '#id_libro', function(){
        //      var id = $("#id_libro").val();
            
        //         var url = "verfica_libro.php";
        //             $.ajax({                        
        //             type: "POST",                 
        //             url: url,                     
        //             data: {id:id}, 
        //             dataType:"html",
        //             success: function(respnse)             
        //             {   
                       
        //                 if (respnse.trim() === "existe"){
        //                     $('#existeLibro').html("<span style='color:red;'>Este código está registrado</span>");
        //                     $('#insertar').attr("disabled", true);
        //                 }  
        //                 if (respnse.trim() === "ok"){
        //                     $('#existeLibro').html("<span style='color:green;'>Código Válido</span>");;
        //                     $('#insertar').attr("disabled", false);
        //                 }
        //                 if(id==''){
        //                     $('#existeLibro').html("<span style='color:#a04815;'>Escriba un código válido</span>");
        //                     $('#insertar').attr("disabled", true);
        //                 }
                      
        //             }
        //         });   
           
        
        // })

            
})
</script>
