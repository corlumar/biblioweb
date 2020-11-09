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
  $queryDewey = $conn->query("SELECT * FROM clasificaDewey order by id_dewey");
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
 
<form  id="form-libro" action="insertar_libro.php" method="post" style="padding-bottom: 1%;"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>

        <h3 style="text-align: center; color:white">INSERTAR NUEVO LIBRO</h3>
        
        <p><span class="error">* Campos Requeridos</span></p>

        <input name="id_libro" id="id_libro" type="text" placeholder="id_libro" autocomplete="on" required>
        <div id="existeLibro"></div>


        <input name="titulo" type="text" placeholder="titulo" required>

        
      <select name="nautor" id="nautor" class="select-css">
        <option selected="true" value="" disabled>seleccione Autor</option>
            <?php
            while($registroAutor  = $queryAutor->fetch_array( MYSQLI_BOTH)){ ?>
            <option value="<?php echo $registroAutor['id_autor'];?>"><?php echo $registroAutor['nombre_autor'] . " " .  $registroAutor['apellido_autor'];?></option>-->
            <?php } ?>
            
           
            <option value="nuevo">Nuevo</option>
        </select>
        <br>
        <div id="dAutorNuevo">
            <input name="nombre_autor" type="text" >
            
            <input name="apellido_autor" type="text">			
        </div>
        <div id="dAutorexiste">
            <input name="idautor" id="idautor" type="text">
        </div>
        
        <select name="editoriale" id="editoriale" class="select-css">
        <option selected="true" value="" disabled>Seleccione Editorial</option>
            <?php
            while($registroEditorial  = $queryEditorial->fetch_array( MYSQLI_BOTH)){ ?>
            <option value="<?php echo $registroEditorial['id_editorial'];?>"><?php echo $registroEditorial['editorial'];?></option>
            <?php } ?>
            <option value="nueva">Nueva</option>
            
        </select>

        <div id="editorialNuevo">
            <input name="editorial"  id="editorial" type="text" placeholder="editorial" >
            <input name="ciudad"  id="ciudad" type="text" placeholder="ciudad" >

        </div>  
        
        <div id="editorialExiste">
            <input name="ideditorial" id="ideditorial" type="text" >
        </div>

        
        <input name="edicion" type="text" placeholder="edicion" required>
        
        
          <select name="clasifica" id="clasifica" class="select-css">
            <option selected="true" value="" disabled>Seleccione Clasificación</option>
                <?php
                while($registroClasifica  = $queryDewey->fetch_array( MYSQLI_BOTH)){ ?>
                <option value="<?php echo $registroClasifica['id_dewey'];?>"><?php echo $registroClasifica['dewey_clasificacion'];?></option>
                <?php } ?>
                 
            </select>


        <input name="anio" type="number" min="1500" placeholder="anio" required>

        <input name="disponibilidad" type="number" min="1" placeholder="disponibilidad" required>

         <input name="insertar" id="insertar" type="submit" value="Insertar Datos" class="button"> 
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
            $('#insertar').attr("disabled", true);
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
                
                <script>
    
  function validarFormulario(){
 
    var txtNombre = document.getElementById('#nombre_autor').value;
    
    if(txtNombre == null || txtNombre.length == /^[a-zA-ZÑñÁáÉéÍíÓóÚú\s]+$/.test(txtNombre)){
      alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
      return false;
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
        
        $(document).on('keyup', '#id_libro', function(){
             var id = $("#id_libro").val();
            
                var url = "verfica_libro.php";
                    $.ajax({                        
                    type: "POST",                 
                    url: url,                     
                    data: {id:id}, 
                    dataType:"html",
                    success: function(respnse)             
                    {   
                       
                        if (respnse.trim() === "existe"){
                            $('#existeLibro').html("<span style='color:red;'>Este código está registrado</span>");
                            $('#insertar').attr("disabled", true);
                        }  
                        if (respnse.trim() === "ok"){
                            $('#existeLibro').html("<span style='color:green;'>Código Válido</span>");;
                            $('#insertar').attr("disabled", false);
                        }
                        if(id==''){
                            $('#existeLibro').html("<span style='color:#a04815;'>Escriba un código válido</span>");
                            $('#insertar').attr("disabled", true);
                        }
                      
                    }
                });   
           
        
        })

            
})
</script>
