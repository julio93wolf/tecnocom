function password(){
	var password;
	password = document.getElementById("in_Contrasena").value;
	if(password.length<5){
		document.getElementById("progrs_low").style.width='0%';	
		document.getElementById("progrs_int").style.width='0%';	
		document.getElementById("progrs_str").style.width='0%';	
	}
	if(password.length>=5 && password.length<10){
		document.getElementById("progrs_low").style.width='25%';	
		document.getElementById("progrs_int").style.width='0%';	
		document.getElementById("progrs_str").style.width='0%';	
	}
	if(password.length>=10 && password.length<15){
		document.getElementById("progrs_low").style.width='0%';	
		document.getElementById("progrs_int").style.width='50%';	
		document.getElementById("progrs_str").style.width='0%';	
	}
	if(password.length>=15){
		document.getElementById("progrs_low").style.width='0%';	
		document.getElementById("progrs_int").style.width='0%';	
		document.getElementById("progrs_str").style.width='100%';	
	}
}

function new_password(){
	if(document.getElementById("in_Password").checked){
		document.getElementById("in_Contrasena").disabled = false;
		document.getElementById("in_Confirmar").disabled = false;
		document.getElementById("in_Anterior").disabled = false;
	}else{
		document.getElementById("in_Contrasena").disabled = true;
		document.getElementById("in_Confirmar").disabled = true;
		document.getElementById("in_Anterior").disabled = true;
		document.getElementById("in_Contrasena").value = "";
		document.getElementById("in_Confirmar").value = "";
		document.getElementById("in_Anterior").value = "";
		document.getElementById("progrs_low").style.width='0%';	
		document.getElementById("progrs_int").style.width='0%';	
		document.getElementById("progrs_str").style.width='0%';	
	}	
}
