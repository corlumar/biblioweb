<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Crear una cuenta</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/estilos.css">
   
  </head>
<body>

<div class="container">

	<?php

	require_once 'conecta.php';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	
	$checkEmail = "SELECT * FROM users WHERE email = '$_POST[email]' ";

	
	$result = $conn-> query($checkEmail);

	
	$count = mysqli_num_rows($result);

	
	if ($count == 1) {
	echo "<div class='alert alert-warning mt-4' role='alert'>
					<p>That email is already in our database.</p>
					<p><a href='login.html'>Por favor logueate aquí...Please login here</a></p>
				</div>";
	} else {	
	
	
	$name = $_POST['nombre'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$rol = $_POST['rol']<
	
	
	$passHash = password_hash($pass, PASSWORD_DEFAULT);
	
	
	$query = "INSERT INTO users (nombre, email, password, rol) VALUES ('$nombre', '$email', '$passHash', 'rol')";

	if (mysqli_query($conn, $query)) {
		echo "<div class='alert alert-success mt-4' role='alert'><h3>Su cuenta ha sido creada.</h3>
		<a class='btn btn-outline-primary' href='login.html' role='button'>Login</a></div>";		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
	}	
	mysqli_close($conn);
	?>
</div>
	
  </body>
</html>