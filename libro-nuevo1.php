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
  $queryLibro = $conn->query("SELECT * FROM libro order by id_libro");
  $queryAutor = $conn->query("SELECT * FROM autor order by id_autor");
  $queryEditorial = $conn->query("SELECT * FROM editorial order by id_editorial");
  $queryDewey = $conn->query("SELECT * FROM clasificaDewey order by id_dewey");
  $queryDisponibilidad = $conn->query("SELECT * FROM disponibilidad order by id_disponibilidad");
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
 
 
 <?php
// define variables and set to empty values
$isbnErr = $tituloErr = $autorErr = $editorialErr = $edicionErr = $clasificacionErr = $añoErr = $disponibilidadErr = "";
$isbn = $titulo = $autor = $editorial = $edicion = $clasificacion = $año = $disponibilidad = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["isbn"])) {
    $isbnrErr = "El ISBN es requerido ";
  } else {
    $isbn = test_input($_POST["isbn"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9' ]*$/",$isbn)) {
      $isbnrErr = "Solo ISBN y trece digitos";
    }
  }
  
  
  if (empty($_POST["titulo"])) {
    $tituloErr = "El título es requerido";
  } else {
    $titulo = test_input($_POST["titulo"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$titulo)) {
      $tituloErr = "Solo letras y espacios en blanco";
    }
  }
  

  if (empty($_POST["autor"])) {
    $autorErr = "El Nombre del autor es requerido";
  } else {
    $autor = test_input($_POST["autor"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$autor)) {
      $autorErr = "Solo letras y espacios en blanco";
    }
  }
  
  if (empty($_POST["editorial"])) {
    $editorialErr = "El Nombre de la editorial es requerido";
  } else {
    $editorial = test_input($_POST["editorial"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$editorial)) {
      $editorialErr = "Solo letras y espacios en blanco";
    }
  }
  
  if (empty($_POST["edicion"])) {
    $edicionErr = "La edicion es requerida";
  } else {
    $edicion = test_input($_POST["edicion"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$edicion)) {
      $edicionErr = "Solo letras y espacios en blanco";
    }
  }
  
  if (empty($_POST["clasificacion"])) {
    $clasificacionErr = "La clasificación es requerida";
  } else {
    $clasificacion = test_input($_POST["clasificacion"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$clasificacion)) {
      $clasificacionErr = "Solo letras y espacios en blanco";
    }
  }
  
  if (empty($_POST["año"])) {
    $añoErr = "El año es requerido";
  } else {
    $año = test_input($_POST["año"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$año)) {
      $añoErr = "Solo letras y espacios en blanco";
    }
  }
  
  if (empty($_POST["año"])) {
    $añoErr = "El año es requerido";
  } else {
    $año = test_input($_POST["año"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$año)) {
      $añoErr = "Solo letras y espacios en blanco";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }    
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  ISBN: <input type="text" name="isbn" placeholder="id_libro" autocomplete="on" required>
  <span class="error">* <?php echo $isbnErr;?></span>
  <div id="existeLibro"></div>
  <br><br>
  TITULO: <input type="text" name="titulo" placeholder="Título">
  <span class="error">* <?php echo $tituloErr;?></span>
  <br><br>
  AUTOR: <input type="text" name="autor" placeholder="Autor">
  <span class="error">* <?php echo $autorErr;?></span>
  
  <select name="nautor" id="nautor" class="select-css">
        <option selected="true" value="" disabled>seleccione Autor</option>
            <?php
            while($registroAutor  = $queryAutor->fetch_array( MYSQLI_BOTH)){ ?>
            <option value="<?php echo $registroAutor['id_autor'];?>"><?php echo $registroAutor['nombre_autor'] . " " .  $registroAutor['apellido_autor'];?></option>
            <?php } ?>
            
            
    <option value="nuevo">Nuevo</option>
        </select>
        <br>
        <div id="dAutorNuevo">
            <input name="nombre_autor" type="text" >
            <span class="error">* <?php echo $nombre_autorErr;?></span>
            <br><br>
            <input name="apellido_autor" type="text">
            <span class="error">* <?php echo $apellido_autorErr;?></span>
            <br><br>
            
        </div>
        <div id="dAutorexiste">
            <input name="idautor" id="idautor" type="text">
        </div>
  <br><br>
  EDITORIAL: <input type="text" name="editorial" placeholder="Editorial">
  <span class="error">* <?php echo $editorialErr;?></span>
  <br><br>
  EDICION: <input type="text" name="edicion" placeholder="Edición">
  <span class="error">* <?php echo $edicionErr;?></span>
  <br><br>
  CLASIFICACION: <input type="text" name="clasificacion" placeholder="Dewey">
  <span class="error">* <?php echo $clasificacionErr;?></span>
  <br><br>
  AÑO: <input type="number" name="año" placeholder="Año">
  <span class="error">* <?php echo $añoErr;?></span>
  <br><br>
  DISPONIBILIDAD: <input type="number" name="disponibilidad" placeholder="Disponible">
  <span class="error">* <?php echo $disponibilidadeErr;?></span>
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
</form>


</body>


<form  id="form-libro" action="insertar_libro.php" method="post" style="padding-bottom: 1%;"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>

        <h3 style="text-align: center; color:white">INSERTAR NUEVO LIBRO</h3>
        
        <p><span class="error">* Dato requerido</span></p>

        <input name="id_libro" id="id_libro" type="text" placeholder="id_libro" autocomplete="on" required>
        
        <div id="existeLibro"></div>


        <input name="titulo" type="text" placeholder="titulo" required>

        
        <select name="nautor" id="nautor" class="select-css">
        <option selected="true" value="" disabled>seleccione Autor</option>
            <?php
            while($registroAutor  = $queryAutor->fetch_array( MYSQLI_BOTH)){ ?>
            <option value="<?php echo $registroAutor['id_autor'];?>"><?php echo $registroAutor['nombre_autor'] . " " .  $registroAutor['apellido_autor'];?></option>
            <?php } ?>
            
            
    <option value="nuevo">Nuevo</option>
        </select>
        <br>
        <div id="dAutorNuevo">
            <input name="nombre_autor" type="text" >
            <span class="error">* <?php echo $nombre_autorErr;?></span>
            <br><br>
            <input name="apellido_autor" type="text">
            <span class="error">* <?php echo $apellido_autorErr;?></span>
            <br><br>
            
        </div>
        <div id="dAutorexiste">
            <input name="idautor" id="idautor" type="text">
        </div>
        
      
      //   <input name="insertar" id="insertar" type="submit" value="Insertar Datos" class="button"> 
       <button id="insertar" name="insertar" class="button">Insertar</button>
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
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre_autor)) {
      $nombre_autorErr = "Only letters and white space allowed";
   
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
