<?php
session_start();
$nom=$_SESSION['nombre'];
					
			require_once 'conecta.php';	
			
			
			// $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
		  if(isset($_POST["entrar"]))
		  {

		  	$email = $_POST['email']; 
			$password = $_POST['password'];
			$buscar="SELECT id_users,email, password,nombre,id_rol FROM users WHERE email = '$email' and password='$password'";
            //echo $buscar;
		    $result = mysqli_query($conn,$buscar);
			
			if($row = mysqli_fetch_assoc($result))
			{
			//$_SESSION['id_clave'] = true;
			$_SESSION['nombre'] = $row['nombre'];
			$_SESSION['idUsuario'] = $row['id_users'];
			
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;		
            $rol=$row["id_rol"];
            //echo $rol;
            switch ($rol) {
            	case 1:
            		echo '<script languaje="javascript">window.location="rol_admin1.php"</script>';
            		break;
            	case 2:
            		echo '<script languaje="javascript">window.location="rol_administrativo1.php"</script>';

            		break;
            	case 3:
            		echo '<script languaje="javascript">window.location="rol_alumno.php"</script>';
            		break;
            	case 4:
            		echo '<script languaje="javascript">window.location="rol_docente.php"</script>';
            		break;
            	case 5:
            		echo '<script languaje="javascript">window.location="rol_invitado.php"</script>';
            		break;
            	default:
            		header("loginn.php");
            		break;
               }
             }
            else {
				echo "<div class='alert alert-danger mt-4' role='alert'>Email o Password son incorrectos!
				<p><a href='loginn.php'><strong>Por favor trata otra vez!</strong></a></p></div>";			
			}	
		  }
		  else
		  {
		  	echo "no entra";
		  }
			
	

			/*if (mysqli_query($conn, $buscar)) {
			
			
			//if (password_verify($_POST['password'], $hash)) {	
				
				$_SESSION['id_clave'] = true;
				$_SESSION['nombre'] = $row['nombre'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;						
				
				echo "<div class='alert alert-success mt-4' role='alert'><strong>Bienvenido  </strong>".$row['nombre']."
				
				<p>.</p>
				
				<p>.</p>
				<p><a href='edit-profile.php'>Editar </a></p>	
				<p><a href='logout.php'>Logout</a></p></div>";	
			
			} else {
				echo "<div class='alert alert-danger mt-4' role='alert'>Email o Password son incorrectos!
				<p><a href='login.html'><strong>Por favor trata otra vez!</strong></a></p></div>";			
			}	*/
			?>
