$(document).ready(function(){

	//Editar
	$('table tbody a.btn-info').live('click', function(){
		$('#btnActualizar').show();
		$('#btnGrabar').hide();
		$('#txtCodDoc').attr('readonly', true);
		$('#txtNomDoc').attr('readonly', false);
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
            }
         });
	});

	//Visualizar
	$('table tbody a.btn-success').live('click', function(){
		$('#btnGrabar').hide();
		$('#btnActualizar').hide();
		$('#txtCodDoc').attr('readonly', true);
		$('#txtNomDoc').attr('readonly', true);
		Limpiar();

		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 0:
                	$('#txtCodDoc').val($(this).text());
                	break;
                case 1:
                	$('#txtNomDoc').val($(this).text());
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
		Limpiar();
	});

	function Limpiar(){
		$('#txtCodDoc').val("");
		$('#txtNomDoc').val("");
		$('#mensaje').hide();
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
			 	url: base_path + 'tipoDocumento/ActualizarTipoDocumento',
			 	data: $('form').serialize(), 
			 	success: function(resp) { 
			 		
					if(resp == "1"){
						ShowMessage("Confirmación opeación", "Se ha actualizado con éxito.", "alert alert-success");

						//Actualizamos la página
						setTimeout(function () {
							location.reload();
                        }, 2000);
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
			 	url: base_path + 'tipoDocumento/AgregarTipoDocumento',
			 	data: $('form').serialize(), 
			 	success: function(resp) { 
			 		
					if(resp == "1"){
						ShowMessage("Confirmación opeación", "Se ha registrado con éxito.", "alert alert-success");

						//Actualizamos la página
						setTimeout(function () {
							location.reload();
                        }, 2000);
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

	function ValidarFormulario(){
		var mensaje = "";

		if($("#txtCodDoc").val() == ""){
			mensaje = "Debe ingresar el código del típo de documento.";
			$("#txtCodDoc").focus();
		}
		else if($('#txtNomDoc').val() == "" ){
			mensaje = "Debe ingresar el nombre del típo de documento.";
			$("#txtNomDoc").focus();
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