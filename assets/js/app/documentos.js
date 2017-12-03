$(document).ready(function(){

	//Alertas
	$('table tbody a.btn-warning').live('click', function(){
		$('#codDoc').attr('readonly', true);
		$('#txtDiaAle').attr('readonly', false);
		$('#txtColor').attr('readonly', false);
		$('#txtOrdAlerta').attr('readonly', false);
		$('#txtDiaAle').focus();
		LimpiarAlerta();

		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 0:
                	$('#codDoc').val($(this).text());
                	break;
            }
         });

		//Consulta la informacion de la alerta
		$.ajax({
			type: $('form').attr("method"),
		 	url: base_path + 'documentoRadicacion/GetInfoAlerta',
		 	data: {codDoc: $('#codDoc').val()}, 
		 	success: function(resp) { 
		 		
		 		if(resp != ""){
	 			
		 			$('#btnGrabarAlerta').html('Actualizar');
		 			var infoAle = jQuery.parseJSON(resp);
		 			
		 			//Llena el formulario
					$('#txtDiaAle').val(infoAle.DIA_ALE);
					$('#txtOrdAlerta').val(infoAle.ORD_ALE);
					$('#txtColor').val(infoAle.COL_ALE);
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

	$('#btnGrabarAlerta').click(function(){

		//Validacion de campos
		if( $('#codDoc').val() == ''){
			ShowMsg("Formulario incompleto", "No se ha ingresado el codigo del documento.", "alert alert-error");
		}
		else if($('#txtDiaAle').val() == ''){
			ShowMsg("Formulario incompleto", "Debe ingresar el día de aleta.", "alert alert-error");
		}
		else if($('#txtOrdAlerta').val() == ''){
			ShowMsg("Formulario incompleto", "Debe ingresar el orden de alerta.", "alert alert-error");
		}
		else{

			if($('#btnGrabarAlerta').val() == "Grabar"){

				$.ajax({
					type: $('form').attr("method"),
				 	url: base_path + 'documentoRadicacion/RegistrarAlerta',
				 	data: {codDoc: $('#codDoc').val(), diaAle: $('#txtDiaAle').val(), ordAle: $('#txtOrdAlerta').val(), colAle: $('#txtColor').val() }, 
				 	success: function(resp) { 
				 		ShowMsg("Confirmación opeación", resp, "alert alert-success");
					},
					error: function(){
						alert("Error");
					}
				});
			}
			else{
				$.ajax({
					type: $('form').attr("method"),
				 	url: base_path + 'documentoRadicacion/ActualizarAlerta',
				 	data: {codDoc: $('#codDoc').val(), diaAle: $('#txtDiaAle').val(), ordAle: $('#txtOrdAlerta').val(), colAle: $('#txtColor').val() }, 
				 	success: function(resp) { 
				 		ShowMsg("Confirmación opeación", resp, "alert alert-success");
					},
					error: function(){
						alert("Error");
					}
				});
			}
		}

	});

	//Editar
	$('table tbody a.btn-info').live('click', function(){
		$('#btnActualizar').show();
		$('#btnGrabar').hide();
		$('#txtCodDoc').attr('readonly', true);
		$('#txtNomDoc').attr('readonly', false);
		$('#txtOrden').attr('readonly', false);
		$('#txtDias').attr('readonly', false);
		$('#txtCodDoc').focus();
		Limpiar();

		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 0:
                	$('#txtCodDoc').val($(this).text());
                	break;
                case 1:
                	$('#txtNomDoc').val($(this).text());
                	break;
                case 2:
                	$('#txtOrden').val($(this).text());
                	break;
                case 3:
                	$('#txtDias').val($(this).text());
                	break;
            }
         });
	});

	//Visualizar
	$('table tbody a.btn-success').live('click', function(){
		$('#btnGrabar').hide();
		$('#btnActualizar').hide();
		$('#txtCodDoc').attr('readonly', true);
		$('#txtNomDoc').attr('readonly', true);
		$('#txtOrden').attr('readonly', true);
		$('#txtDias').attr('readonly', true);
		Limpiar();

		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 0:
                	$('#txtCodDoc').val($(this).text());
                	break;
                case 1:
                	$('#txtNomDoc').val($(this).text());
                	break;
                case 2:
                	$('#txtOrden').val($(this).text());
                	break;
                case 3:
                	$('#txtDias').val($(this).text());
                	break;
            }
         });
	});

	//Agregar nuevo documento
	$("#btnAgregarDoc").click(function(){
		$('#btnGrabar').show();
		$('#btnActualizar').hide();
		$('#txtCodDoc').focus();
		$('#txtCodDoc').attr('readonly', false);
		$('#txtNomDoc').attr('readonly', false);
		$('#txtOrden').attr('readonly', false);
		$('#txtDias').attr('readonly', false);
		Limpiar();
	});

	function Limpiar(){
		$('#txtCodDoc').val("");
		$('#txtNomDoc').val("");
		$('#txtOrden').val("");
		$('#txtDias').val("");
		$('#mensaje').hide();
	}

	function LimpiarAlerta(){
		$('#codDoc').val("");
		$('#txtDiaAle').val("");
		$('#txtColor').val("#43a1da");
		$('#txtDias').val("");
		$('#txtOrdAlerta').val("");				
		$('#msgAlerta').hide();
	}

	$('#btnActualizar').click(function(){
		
		var incompleto = ValidarFormulario();

		if(incompleto != ""){
			ShowMessage("Formulario incompleto", incompleto, "alert alert-error");
		}
		else{				
			//Graba el documento
			$.ajax({
				type: $('form').attr("method"),
			 	url: base_path + 'documentoRadicacion/ActualizarDocumento',
			 	data: $('form').serialize(), 
			 	success: function(resp) { 
			 		
					if(resp == "1"){
						ShowMessage("Confirmación opeación", "Se ha actualizado con éxito.", "alert alert-success");

						//Actualizamos la página
						setTimeout(function () {
							location.reload();
                        }, 3000);
			 		}
			 		else{
						ShowMessage("Formulario incompleto", "El documento con código proporcionado NO existe", "alert alert-error");
			 		}
			 		
				},
				error: function(){
					alert("Error");
				}

			 });
		}
	});

	$('#btnGrabar').click(function(){

		var incompleto = ValidarFormulario();

		if(incompleto != ""){
			ShowMessage("Formulario incompleto", incompleto, "alert alert-error");
		}
		else{
			
			//Graba el documento
			$.ajax({
				type: $('form').attr("method"),
			 	url: base_path + 'documentoRadicacion/RegistrarDocumento',
			 	data: $('form').serialize(), 
			 	success: function(resp) { 
			 		
					if(resp == "1"){
						ShowMessage("Confirmación opeación", "Se ha registrado con éxito.", "alert alert-success");

						//Actualizamos la página
						setTimeout(function () {
							location.reload();
                        }, 3000);
			 		}
			 		else{
						ShowMessage("Formulario incompleto", "El documento con código proporcionado ya existe", "alert alert-error");
			 		}
			 		
				},
				error: function(){
					alert("Error");
				}

			 });
		}
	});

	function ShowMessage(titulo, texto, clase){
		$('#mensaje').show();
		$('#mensaje').removeClass();
		$('#mensaje').addClass(clase);
		$('#mensaje').find('strong').html(titulo);
		$('#mensaje').find('div').html(' ' + texto);
	}

	function ShowMsg(titulo, texto, clase){
		$('#msgAlerta').show();
		$('#msgAlerta').removeClass();
		$('#msgAlerta').addClass(clase);
		$('#msgAlerta').find('strong').html(titulo);
		$('#msgAlerta').find('div').html(' ' + texto);
	}

	function ValidarFormulario(){
		var mensaje = "";

		if($("#txtCodDoc").val() == ""){
			mensaje = "Debe ingresar el código del documento.";
			$("#txtCodDoc").focus();
		}
		else if($('#txtNomDoc').val() == "" ){
			mensaje = "Debe ingresar el nombre del documento.";
			$("#txtNomDoc").focus();
		}
		else if($('#txtOrden').val() == "" ){
			mensaje = "Debe ingresar el orden del documento.";
			$("#txtOrden").focus();
		}
		else if($('#txtDias').val() == "" ){
			mensaje = "Debe ingresar el numero de días documento.";
			$("#txtDias").focus();
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