<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Edit profile page</title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
  </head>
  
  <body>      
    <?php
    if (isset($_SESSION['loggedin'])) {  
    }
    else {
        echo "<div class='alert alert-danger mt-4' role='alert'>
        <h4>You need to login to access this page.</h4>
        <p><a href='login.html'>Login Here!</a></p></div>";
        exit;
    }
    // checking the time now when check-login.php page starts
    $now = time();           
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "<div class='alert alert-danger mt-4' role='alert'>
        <h4>Your session has expire!</h4>
        <p><a href='login.html'>Login Aquí</a></p></div>";
        exit;
        }
    ?>

    <div class="container">
        <p>Bienvenido: <?php echo $_SESSION['name']; ?></p>
        <h3>Edite su perfil</h3>
        <ul>
            
            <li>Change password</li>
            
        </ul>
        <p><a href="logout.php">Logout</a></p>
    </div>


	</body>
</html>