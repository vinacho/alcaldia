$(document).ready(function(){
			
	//$('#cmbFuncionario').next().css('width', '70%');
	$('.chzn-container-single').css('width', '70%');
	$('.chzn-drop').css('width', '100%');
	$('.chzn-drop').find('input[type="text"]').css('width', '95%');

	//Asignar
	$('table tbody a.btn-success').live('click', function(){
		$('#pnlasignacion').show();
		$('#pnlTabla').hide();

		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 1:
					$('#txtNumTick').val($(this).text());
            		break;
            }
        });
	});

	$('#btnGuardar').click(function(event) { 

		var msg = ValidarFormulario();
		
		if(msg != ""){
			ShowMessage("Formulario incompleto", msg, " icon-warning-sign", "warning");
		}
		else{
			//asigna el caso
			$.ajax({
				type: $('form').attr("method"),
			 	url: base_path + 'asignarPqrsf/AsignarPqrsf',
			 	data: $('form').serialize(), 
			 	success: function(resp) { 
					if(resp == ""){

						ShowMessage("Formulario incompleto", "Se ha asignado el caso con éxito.", " icon-warning-sign", "success");

						//Actualizamos la página
						setTimeout(function () {
							location.reload();
                        }, 1000);
			 		}
			 		else{
						ShowMessage("Confirmación opeación", resp, "alert alert-error");
			 		}
				},
				error: function(){
					alert("Error");
				}

			 });
		}
	});

	$('#btnCancelar').click(function(){ 
		$('#pnlasignacion').hide();
		$('#pnlTabla').show();
	});

	function ShowMessage(titulo, texto, icono, tipo){
		new PNotify({
		    title: titulo,
		    text: texto,
		    icon: icono,
		    type: tipo
		});
	}

	function ValidarFormulario(){
		var mensaje = "";
		if($('#txtNumTick').val() == ""){
			mensaje = "Debe ingresar el numero de tick del sistema.";
		}
		else if($('#cmbFuncionario').val() == ""){
			mensaje = "Debe seleccionar el funcionario a asignar.";
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