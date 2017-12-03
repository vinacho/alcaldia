$(document).ready(function(){

	$('#txtuser').focus();
	$('#btnIniciarSesion').click(function(event){
		
		event.preventDefault();
		
		//Validacion de campos	
		var mensaje = ValidarLogin();

		if(mensaje != ""){
			ShowMessageLogin("Formulario incompleto", mensaje, " icon-warning-sign", "warning");
		}
		else{

			//Realiza la petición Ajax para validar formulario
			$.ajax({
				type: $('#form1').attr("method"),
			 	url: base_path + "login/ExisteUsuario",
			 	data: $('#form1').serialize(),
			 	success: function(resp) { 
			 		
					if(resp != ""){
						ShowMessageLogin("Intento de login fallido", resp, " icon-warning-sign", "error");
			 		}
			 		else{

						ShowMessageLogin("Confirmación login", "Bienvenido al sistema", " icon-warning-sign", "success");

						//Actualizamos la página
						setTimeout(function () {
							$('#form1').submit();
	    					return false;				
	                    }, 1000);
			 		}
				},
				error: function(result){
					alert("Error " + result.status + ' ' + result.statusText);
				}
			 });					
		}

	});

	function ShowMessageLogin(titulo, texto, icono, tipo){
		new PNotify({
		    title: titulo,
		    text: texto,
		    icon: icono,
		    type: tipo
		});
	}

	function ValidarLogin(){
		var mensaje = "";

		if($('#txtuser').val() == ""){
			mensaje = "Debe ingresar el login de usuario";
			$('#txtuser').focus();
		}
		else if($('#txtpwd').val() == ""){
			mensaje = "Debe ingresar la contraseña";
			$('#txtpwd').focus();
		}
		return mensaje;
	}

});

//Variable global javascipt que almacena la base_url del sitio
var base_path = '';

//Funcion que recibe la base_url del sitio
function base_site(base){
	base_path = base;		
}