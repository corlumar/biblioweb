function validarForm()
{
	var verificar = true;
	var expRegNombre=/^[a-zA-ZÑñÁáÉéÍíÓóÚú\s]+$/;

	var expRegEmail=/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
					

	var expRegPassword=/^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/;
						

	var formulario = document.getElementById("registro-frm");
	Name = document.getElementById("Name").value;
	Email = document.getElementById("Email").value;
	Password = document.getElementById("Password").value;


	if(!name.value)
	{
		alert("El campo nombre es requerido");
		name.focus();
		verificar = false;

	}
	if(!email.value)
	{
		alert("El campo email es requerido");
		email.focus();
		verificar = false;

	}
	else if(!expRegEmail,exec(email.value))
	{
		alert("El correo electrónico no es válido");
		email.focus();
		verificar=false;
	}
	if(!password.value)
	{
		alert("El campo password es requerido");
		password.focus();
		verificar = false;

	}
	else if(!expRegPassword,exec(password.value))
	{
		alert("El correo electrónico no es válido");
		password.focus();
		verificar=false;
	}

window.onload = function()
{
	var botonEnviar, botonLimpiar;
	botonLimpiar = document.getElementById("limpiar");
	botonLimpiar.onclick = limpiarForm;
		
	botonEnviar = document.registro_frm.enviar_btn;
	botonEnviar.onclick = validarForm;
}
