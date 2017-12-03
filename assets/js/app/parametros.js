$(document).ready(function(){

	//Editar
	$('table tbody a.btn-info').live('click', function(){
		$('#btnActualizar').show();
		$('#btnGrabar').hide();
		$('#txtCodPar').attr('readonly', true);
		$('#txtNomPar').attr('readonly', false);
		$('#txtValPar').attr('readonly', false);
		$('#txtCodPar').focus();
		Limpiar();

		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 0:
                	$('#txtCodPar').val($(this).text());
                	break;
                case 1:
                	$('#txtNomPar').val($(this).text());
                	break;
            	case 2:
            		$('#txtValPar').val($(this).text());
                	break;
            }
         });
	});

	//Visualizar
	$('table tbody a.btn-success').live('click', function(){
		$('#btnGrabar').hide();
		$('#btnActualizar').hide();
		$('#txtCodPar').attr('readonly', true);
		$('#txtNomPar').attr('readonly', true);
		$('#txtValPar').attr('readonly', true);
		Limpiar();

		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 0:
                	$('#txtCodPar').val($(this).text());
                	break;
                case 1:
                	$('#txtNomPar').val($(this).text());
                	break;
            	case 2:
            		$('#txtValPar').val($(this).text());
                	break;
            }
         });
	});

	//Agregar nuevo documento
	$("#btnAgregarDoc").click(function(){
		$('#btnGrabar').show();
		$('#btnActualizar').hide();
		$('#txtCodPar').focus();
		$('#txtCodPar').attr('readonly', false);
		$('#txtNomPar').attr('readonly', false);
		$('#txtValPar').attr('readonly', false);
		Limpiar();
	});

	function Limpiar(){
		$('#txtCodPar').val("");
		$('#txtNomPar').val("");
		$('#txtValPar').val("");
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
			 	url: base_path + 'parametros/ActualizarParametro',
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
			 	url: base_path + 'parametros/AgregarParametro',
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
						ShowMessage("Formulario incompleto", "El parámetro con código proporcionado ya existe", "alert alert-error");
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

		if($("#txtCodPar").val() == ""){
			mensaje = "Debe ingresar el código del parametro.";
			$("#txtCodPar").focus();
		}
		else if($('#txtNomPar').val() == "" ){
			mensaje = "Debe ingresar el nombre del parametro.";
			$("#txtNomPar").focus();
		}
		else if($('#txtValPar').val() == "" ){
			mensaje = "Debe ingresar el valor del parámetro.";
			$("#txtValPar").focus();
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