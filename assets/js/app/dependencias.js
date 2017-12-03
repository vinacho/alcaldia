$(document).ready(function(){

	//Editar
	$('table tbody a.btn-info').live('click', function(){
		$('#btnActualizar').show();
		$('#btnGrabar').hide();
		$('#txtCodDep').attr('readonly', true);
		$('#txtNombreDep').attr('readonly', false);
		$('#txtPrefijoDep').attr('readonly', false);
		$('#txtnumIntEntDep').attr('readonly', false);
		$('#txtnumIntSalDep').attr('readonly', false);
		$('#txtCodDep').focus();
		Limpiar();

		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 0:
                	$('#txtCodDep').val($(this).text());
                	break;
                case 1:
                	$('#txtNombreDep').val($(this).text());
                	break;
            	case 2:
            		$('#txtPrefijoDep').val($(this).text());
                	break;
            	case 3:
            		$('#txtnumIntEntDep').val($(this).text());
                	break;
            	case 4:
            		$('#txtnumIntSalDep').val($(this).text());
                	break;                                                	
            }
         });
	});

	//Visualizar
	$('table tbody a.btn-success').live('click', function(){
		$('#btnGrabar').hide();
		$('#btnActualizar').hide();
		$('#txtCodDep').attr('readonly', true);
		$('#txtNombreDep').attr('readonly', true);
		$('#txtPrefijoDep').attr('readonly', true);
		$('#txtnumIntSalDep').attr('readonly', true);
		$('#txtnumIntEntDep').attr('readonly', true);				
		Limpiar();

		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 0:
                	$('#txtCodDep').val($(this).text());
                	break;
                case 1:
                	$('#txtNombreDep').val($(this).text());
                	break;
            	case 2:
            		$('#txtPrefijoDep').val($(this).text());
                	break;
            	case 3:
            		$('#txtnumIntEntDep').val($(this).text());
                	break;
            	case 4:
            		$('#txtnumIntSalDep').val($(this).text());
                	break;        
            }
         });
	});

	//Agregar nuevo documento
	$("#btnAgregarDoc").click(function(){
		$('#btnGrabar').show();
		$('#btnActualizar').hide();
		$('#txtCodDep').focus();
		$('#txtCodDep').attr('readonly', false);
		$('#txtNomDep').attr('readonly', false);
		$('#txtPrefijoDep').attr('readonly', false);
		$('#txtnumIntSalDep').attr('readonly', false);
		$('#txtnumIntEntDep').attr('readonly', false);
		Limpiar();
	});

	function Limpiar(){
		$('#txtCodDep').val("");
		$('#txtNombreDep').val("");
		$('#txtPrefijoDep').val("");
		$('#txtnumIntSalDep').val("");
		$('#txtnumIntEntDep').val("");
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
			 	url: base_path + 'dependencias/ActualizarDependencia',
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
			 	url: base_path + 'dependencias/AgregarDependencia',
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

		if($("#txtCodDep").val() == ""){
			mensaje = "Debe ingresar el código de la dependencia.";
			$("#txtCodDep").focus();
		}
		else if($('#txtNombreDep').val() == "" ){
			mensaje = "Debe ingresar el nombre de la dependencia.";
			$("#txtNombreDep").focus();
		}
		else if($('#txtPrefijoDep').val() == "" ){
			mensaje = "Debe ingresar el prefijo de la dependencia.";
			$("#txtPrefijoDep").focus();
		}
		else if($('#txtPrefijoDep').val() == "" ){
			mensaje = "Debe ingresar el prefijo de la dependencia.";
			$("#txtPrefijoDep").focus();
		}
		else if($('#txtnumIntSalDep').val() == "" ){
			mensaje = "Debe ingresar el numero interno de salida de correspondencia.";
			$("#txtnumIntSalDep").focus();
		}
		else if($('#txtnumIntEntDep').val() == "" ){
			mensaje = "Debe ingresar el numero interno de entrada de correspondencia.";
			$("#txtnumIntEntDep").focus();
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