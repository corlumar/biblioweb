/* Salio de la sesión adecuadamente   Destroy current user session */

<?php
session_start();
session_unset($_SESSION['email']);
session_destroy();

header('location: loginn.html');
?>