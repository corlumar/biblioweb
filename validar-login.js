function validar(){
	var Name, Email, Password, expresion;
	Name = document.getElementById("Name").value;
	Email = document.getElementById("Email").value;
	Password = document.getElementById("Password").value;

	if(Name === "" || Email === "" || Password === "" ||) {
		alert("Todos los campos son obligatorios");
		return false;
	}
	else if(Name.lenght>64){
		alert("El nombre es muy largo");
		return false;
	}
	else if(Email.lenght>64){
		alert("El correo es muy largo");
		return false;
	}
	else if(Password.lenght<8){
		alert("El password es muy corto");
		return false;
	}

}