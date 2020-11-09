<?php


$dbhost	= "65.99.252.199";	   // localhost or IP
$dbuser	= "bibliot8_root";		  // database username
$dbpass	= "Lome5907.";		     // database password
$dbname	= "bibliot8_biblioteca";    // database name

try {
   $conexion = new PDO("mysql:host=$dbhost; $dbname", $dbuser, $dbpass);
   $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $conexion->exec("set names utf8");
    return$conexion;
    }
catch(PDOException $error)
    {
    echo "No se pudo conectar a la BD: " . $error->getMessage();
    }

?>



