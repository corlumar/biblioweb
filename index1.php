<!DOCTYPE html>

<html lang="es"> 
  <head>
    <title>Index</title>
    
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--	 <link rel="stylesheet" href="css/loginn.css"> -->
   	<link rel="stylesheet" href="css/mis_estilos.css">

   	
    <script language="javascript" type="text/javascript">

		function validar_nombre(nombre)
    	{
    		var expRegNombre=/^[A-ZÁÉÍÓÚ][a-záéíóú]+$/;
						return expRegNombre.test(nombre) ? true:false;
    	}


    	function validar_mail(correo)
    	{
    		var expRegEmail=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;
						return expRegEmail.test(correo) ? true:false;
    	}
    	function validar_pass(clave)
    	{
    		var expRegclave=/^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/;
						return expRegclave.test(clave) ? true:false;
    	}	
    	function validar(registro_frm)
    	{
    		var mensaje_error='El formulario contiene los siguientes errores:\n';
    		var errores=0;

            var nombre=document.registro_frm.nombre_txt.value;
    		
			if(!validar_nombre(nombre))
    		
    		{
    			
	         mensaje_error +='----Este campo no puede estar vacío, ---El nombre empieza por mayúscula1\n';
    			errores++;
		
    		}

    		{
    		var correo=document.registro_frm.email.value;
    		
			if(!validar_mail(correo))
    		
    		{
    			
	         mensaje_error +='-El correo electrónico no es válido\n';
    			errores++;
		
    		}
    		var clave=document.registro_frm.password.value;
    		
    		if(!validar_pass(clave))
    		{
    			mensaje_error +='-El password debe tener al menos 8 caracteres, debe tener al menos una letra minúscula, una letra mayúscula, al menos un carácter numérico y al menos un símbolo\n';
    			errores++;
    		}
    		if(errores>0)
    		{
    			alert(mensaje_error);
    			return false;
    		}
    		else
    		{
    			return true;
    		}
    	}
    </script>
    <title>Validar Password</title>
  </head>
  <body>
 
  <div class="header">
  	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div align="center"> 
				<h1>BIBLIOTECA</h1><h1>UNIVERSIDAD POPULAR DE LA CHONTALPA</h1>
				</div>	
			</div>
		</div>
	</div>
</div>
	
	
		<form id="registro-frm" name="registro_frm" action="" method="POST">

			<fieldset>
				<legend>Registro Usuarios</legend>
				<label for="nombre"> Nombre </label>			
				<input type="text" id="nombre_txt" name="nombre_txt" class="cambio" />
				<br /><br />			
		  	  	<label for="email"> Correo Electrónico </label>			
				<input type="email" id="email" class="cambio" name="email" aria-describedby="emailHelp" />
				<br /><br />
				<label for="password"> Password </label>	
		  		<input type="password" id="password" class="cambio" name="password" />
		  		<br /><br />
		  		
		  		<br />
		  		<div align="center"> 
		  		<select  name="rol" required class="select-css">
		  			<option value="">Selecciona el tipo de Rol</option>
		  			<option value="1">Administrador</option>
		  			<option value="2">Administrativo</option>
		  			<option value="3">Alumno</option>
		  			<option value="4">Docente</option>
		  			<option value="5">Invitado</option>
		  		</select>
		  		<br />
				<p>¿Tienes una cuenta? <a href="loginn.html" title="Logueate aquí">Login aquí!</a></p>
					<input type="submit" id="enviar" class="cambio" name="enviar_btn" value="Enviar" onclick="return validar()" />

				</div>

		  		<!-- <script src="https://www.google.com/recaptcha/api.js?render=6Le60MMUAAAAALygcgNXhvSHNPJ3FyNW1mpLB40P"></script>
				<script>
				grecaptcha.ready(function() {
    			grecaptcha.execute('6Le60MMUAAAAALygcgNXhvSHNPJ3FyNW1mpLB40P', {action: 'homepage'}).then(function(token) {
    			   ...
   				 });
</script> -->
		  		
      	    
  			</fieldset>
  		</form>

			
	<div class="footer">
		<a href="mailto:contacto@upch.mx">Contactanos</a>
		<a href="https://www.google.com.mx/maps/@17.960151,-93.368929,17.78z?hl=es-419">Carr. Cárdenas - Huimanguillo Km. 2.0.Cárdenas, Tabasco México</a>
		<a href="./">Politicas de Privacidad</a> - <a href="./">Condiciones de Uso</a>
		<p></span>Copyright 2020, Universidad Popular de la Chontalpa.</p>Designed by Esteban López Martínez </span></a>


<?php
if(isset($_POST['enviar_btn']))
{
  include 'conecta.php';
	// $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
   
	$nombre = $_POST['nombre_txt'];
	//echo $_POST["nombre_txt"];

	$email = $_POST['email'];
	//echo $email;
	$pass = $_POST['password'];
	//echo $pass;
	$rol = $_POST['rol'];
    //echo $rol;
    $query = "INSERT INTO users (nombre, email, password, id_rol) VALUES ('$nombre', '$email', '$pass', '$rol')";
    //echo $query;
if (mysqli_query($conn, $query)) {
		echo'<script type="text/javascript">
			alert("Su cuenta ha sido creada correctamente");
			window.location.href="index.php";
			</script>';		
		} else {
			echo'<script type="text/javascript">
			alert("Ha oucurrido un error, por favor intentelo de nuevo);
			window.location.href="index.php";
			</script>';
		}	
	
}
?>


