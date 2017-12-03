$(document).ready(function(){

	//$('.cleditorMain').css('width', '71%');

	$('.chzn-container-single').css('width', '71%');
	$('.chzn-drop').css('width', '99.6%');
	$('.chzn-drop').find('input[type="text"]').css('width', '95%');

	$('#btnCancelar').click(function(){
		$('#pnlasignacion').hide();
		$('#pnlReasignacion').show();
	});

	//Asignar
	$('table tbody a.btn-info').live('click', function(){
		$('#pnlasignacion').show();
		$('#pnlReasignacion').hide();

		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 2:
					$('#txtNumTick').val($(this).text());
            		break;
            }
        });

        //Consulta la informacion del PQRSF
		$.ajax({
			type: 'POST',
		 	url: base_path + 'seguimientoPqrsf/GetInfoPqrsf',
		 	data: {numTick: $('#txtNumTick').val()}, 
		 	success: function(resp) { 
		 		
		 		if(resp != ""){	 			
		 			
		 			var infoPqrsf = jQuery.parseJSON(resp);
		 			
		 			//Llena el formulario
					$('#txtAsunto').val(infoPqrsf.ASUNTO);
					$('#txtObservacion').val(infoPqrsf.OBSERVACIONES);
					$('#txtOficio').val(infoPqrsf.NUM_OFI_ENT);

					$('#cmbClaDoc').val(infoPqrsf.COD_DOC);
					$('#cmbClaDoc').next().children('a').children('span').html($("#cmbClaDoc option:selected").html());
	 				$('#cmbClaDoc').next().children('a').attr('class', 'chzn-single');

	 				$('#cmbDependencia').val(infoPqrsf.COD_DEP);
					$('#cmbDependencia').next().children('a').children('span').html($("#cmbDependencia option:selected").html());
	 				$('#cmbDependencia').next().children('a').attr('class', 'chzn-single');

	 				$('#idfun').val(infoPqrsf.COD_FUN);
	 				$('#rolfun').val(infoPqrsf.COD_ROL);
	 				$('#cmbDependencia').change();	 				
		 		}
		 		else{
		 			$('#btnGrabarAlerta').html('Grabar');
		 		}
			},
			error: function(){
				alert("Error");
			}
		});
	});

	$('#cmbDependencia').change(function(){
			
		$.ajax({
			type: 'POST',
		 	url: base_path + 'funcionarios/FuncionariosXDependencia',
		 	data: {codDep: $('#cmbDependencia').val(), rolFun: $('#rolfun').val()}, 
		 	success: function(resp) { 
 		 		$('#cmbFuncionario').empty();
 		 		$('#cmbFuncionario').next().find('div').find('ul').empty();
 		 		//Llenamos el combo
 		 		$('#cmbFuncionario').append("<option value=''>Seleccione >></option>");
		 		var lista = jQuery.parseJSON(resp);
		 		$.each(lista, function(i, funcionario) {

                    // agregamos opciones al combo
                    $('#cmbFuncionario').append("<option value='" + funcionario.COD_FUN + "'>" + funcionario.NOM_FUN + "</option>");
                    $('#cmbFuncionario').next().find('div').find('ul').append('<li id="cmbDependencia_chzn_o_1" class="active-result" style="">' + funcionario.NOM_FUN + '</li>');
                });

                $('#cmbFuncionario').val($('#idfun').val());
		 	},
		 	error: function(){
		 		alert('Error');
		 	}
		 });
	});

	$('#btnGuardar').click(function(){
		//Validacion de campos
		var validacion = ValidarCampos();

		if(validacion != ""){
			ShowMessage("Formulario incompleto", validacion, " icon-warning-sign", "warning");
		}
		else{
			//Guarda el cambio
			$.ajax({
			type: 'POST',
		 	url: base_path + 'reasignarPqrsf/ReasignarPqrsf',
		 	data: $('form').serialize(), 
		 	success: function(resp) {
			 	if(resp == "") {
			 		ShowMessage("Confimración de transacción", "Se ha reasignado el radicado exitosamente", "icon-warning-sign", "success");
	 		 		setTimeout(function () {
						location.reload();
	            	}, 2000);
			 	}
			 	else{
			 		ShowMessage("Inforrmación de transacción", resp, "icon-warning-sign", "error");
			 	}
		 	},
		 	error: function(){
		 		alert('Error');
		 	}
		 });
		}
	});

});

//Variable global javascipt que almacena la base_url del sitio
var base_path = '';

//Funcion que recibe la base_url del sitio
function base_site(base){
	base_path = base;		
}

function ValidarCampos(){
	var mensaje = "";

	if($('#cmbClaDoc').val() == ''){
		mensaje = "Debe seleccionar la clase de documento del radicado.";
		$('#cmbClaDoc').focus();
	}
	else if($('#cmbDependencia').val() == ""){
		mensaje = "Debe seleccionar la dependencia a la que el caso pertenece.";
		$('#cmbDependencia').focus();
	}	
	else if($('#cmbFuncionario').val() == ""){
		mensaje = "Debe seleccionar el funcionario al que se va a asignar el caso.";
		$('#cmbFuncionario').focus();
	}	
	else if($('#txtOficio').val() == ""){
		mensaje = "Debe ingresar el número de oficio.";
		$('#txtOficio').focus();
	}	
	else if($('#txtAsunto').val() == ""){
		mensaje = "Debe ingresar el asunto.";
		$('#txtAsunto').focus();
	}	
	else if($('#txtObservacion').val() == ""){
		mensaje = "Debe ingresar la observación.";
		$('#txtObservacion').focus();
	}	
	return mensaje;
}

function ShowMessage(titulo, texto, icono, tipo){
	new PNotify({
	    title: titulo,
	    text: texto,
	    icon: icono,
	    type: tipo
	});
}