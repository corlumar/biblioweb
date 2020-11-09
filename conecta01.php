<?php


$my['dbhost']	= "localhost:3306";

$my['dbuser']	= "bibliot8_userfinal";

$my['dbpass']	= "#A&jqwWDL=VJ";

$my['dbname']	= "bibliot8_biblioteca";



$conn	= mysqli_connect($my['dbhost'], $my['dbuser'], $my['dbpass']);

mysqli_query($conn, "SET NAMES 'utf8'");

$bdatos 	= mysqli_select_db($conn,$my['dbname']);







if (! $conn) {

  echo "Error de conexión !";

} 

?>



