<?php
if(isset($_POST['submit'])){
	if(empty($nombre)) {
		echo "<p class='error'>* Agrega tu nombre </p>";
	}else{
		if (empty($_POST['nombre'])) {
			$error_name = "Este campo no puede estar vacío";
			}else{
			$name = test_input($_POST['nombre']);
			}
			if (!preg_match('/^[A-ZÁÉÍÓÚ][a-záéíóú]*$/', $n)) {
			$error_nombre = "El nombre empieza por mayúscula";
			}

	if(empty($Email)) {
		echo "<p class='error'>* Agrega tu nombre </p>";
	}else{
		if(strlen($password) < 8){
      $error_password = "El password debe tener al menos 8 caracteres";
      return false;
   }
  
   if (!preg_match('`[a-z]`',$password1)){
      $error_password = "El password debe tener al menos una letra minúscula";
      return false;
   }
   if (!preg_match('`[A-Z]`',$password1)){
      $error_password = "El password debe tener al menos una letra mayúscula";
      return false;
   }
   if (!preg_match('`[0-9]`',$password)){
      $error_password = "El password debe tener al menos un caracter numérico";
      return false;
   }
   $error_password = "";
   return true;
} 

if ($_POST){
   $error_encontrado="";
   if (validar_password($_POST["password1"], $error_encontrado)){
      echo "PASSWORD VÁLIDO";
   }else{
      echo "PASSWORD NO VÁLIDO: " . $error_encontrado;
   }
	}
	if(empty($Password)) {
		echo "<p class='error'>* Agrega tu nombre </p>";
	}
}
}