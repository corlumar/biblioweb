<?php

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: text/html');

	session_start();
	unset($_SESSION["nombre"]); 
	unset($_SESSION["idUsuario"]);
	session_destroy();

$_SESSION = [];

    if (ini_get('session.use_cookies')) {

        $params = session_get_cookie_params();
        setcookie(session_name(),
                  '',
                  time() - 42000,
                  $params['path'],
                  $params['domain'],
                  $params['secure'],
                  $params['httponly']);
    }
    @session_destroy();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" href="css/loginn.css">	
	<link rel="stylesheet" href="css/mis_estilos.css">
	
</head>

<body>
	<section class="grid-container">
		<div class="header"><h1>BIBLIOTECA</h1>
			<h2>UNIVERSIDAD POPULAR DE LA CHONTALPA</h2>
		</div>
		<div>
			
			<form action="check-login.php" method="post" class="login">     
			
				<h2 style="text-align: center; color:white;">INICIO DE SESIÓN</h2>                 	
				<fieldset>
				<label for="email"> Correo </label>			
				<input type="email" class="form-control input-lg" name="email" placeholder="Email" required> <br /><br />			
				<label for="password"> Password </label>	
				<input type="password" class="form-control input-lg" name="password" placeholder="Password" required > 
					
				<div align="center"> 
				    <input type="submit" class="btn btn-success btn-block" name="entrar" value="Login">
				
				
				    <p><a href="login.php" data-toggle="collapse" aria-expanded="false" aria-controls="collapse">¡Registrate!!</a></p>	
				</div>			
			     </fieldset>
	        </form>			
				 <br>
				 <div style="text-align:center;">
				<form action="password-recovery.php" method="post">
														
					<input type="email" class="form-control" name="email" placeholder="Escriba el email asociado con el password." required>
				<script src="https://www.google.com/recaptcha/api.js?render=6Lc1o8MUAAAAAC378WD0XgI8fTq_BYHZ-4B6saBU"></script>	
					<button type="submit" name="entrar"  class="btn btn-dark">Recupere el Password</button>
				</form>		
			</div>						
			 <br>
			

				 <script>

				grecaptcha.ready(function() {

				grecaptcha.execute('6Le60MMUAAAAALygcgNXhvSHNPJ3FyNW1mpLB40P', {action: 'homepage'}).then(function(token) { })

				};			  		

				</script>
		</div>
		
		<div class="footer">
			<a href="mailto:contacto@upch.mx">Contactanos</a>
	 		<a href="https://www.google.com.mx/maps/@17.960151,-93.368929,17.78z?hl=es-419">Carr. Cárdenas - Huimanguillo Km. 2.0.Cárdenas, Tabasco México</a>
	 
			<a href="./">Politicas de Privacidad</a> - <a href="./">Condiciones de Uso</a>
		 
			<span class="valid">Valid <a href="http://validator.w3.org/check?uri=referer">XHTML</a> + <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
			<a href="sitemap.html">Mapa de Sitio</a>
			<p></span>Copyright 2020, Universidad Popular de la Chontalpa.</p>Designed by Esteban López Martínez </span>
		 
			</div> 

		
	</section>

</body>
</html>