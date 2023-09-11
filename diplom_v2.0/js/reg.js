function check_register(form){
	var pass = form.password.value;
	var povtor_pass = form.povtor_password.value;
	var error_password = document.getElementById('error_password');
	var error = "";

	if(pass == "" || povtor_pass==""){
		error = "error";
	}


	if(error == ""){
		if(pass != povtor_pass) {
			error_password.innerHTML = "Введённые пароли различаются";
			error_password.style.color = "red";
			return false;
		}
		else {
		return true;
		}		
		
	}
	
}	