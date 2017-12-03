$(document).ready(function(){

	$('.cleditorMain').css('width', '100%');
	$('#cmbTipPersona').val('PN');

	$('#btnGuardar').click(function	(event){

		event.preventDefault();

		//Validacion de campos
		var mensaje = ValidarFormulario();
		if(mensaje != ""){
			ShowMessage("Formulario incompleto", mensaje, " icon-warning-sign", "warning");
		}
		else{
			//Envia el formulario
			ShowMessage("Confirmación de operación", "Se ha registrado la PQRSF con éxito.", " icon-warning-sign", "success");
			setTimeout(function () {
				$('#form2').submit();
            }, 3500);
		}
	});

	$('#btnLimpiar').click(function(){
		$('#txtCantidadFolios').val('');
		$('#txtAsunto').val('');
		$('#txtAQuienDirigido').val('');
		$('#txtNumOficio').val('');
		$('#txtNumDoc').val('');
		$('#txtDescripcion').val('');
		$('#txtObservacion').val('');
		$('#txtNombres').val('');
		$('#txtApellidos').val('');
		$('#txtDireccion').val('');
		$('#txtNumTelefono').val('');
		$('#txtNumDoc').val('');
		$('#txtCorreo').val('');
		$('#cmbTipPersona > option[value=""]').attr('selected', 'selected');

		$('#cmbTipoDocumento > option[value=""]').attr('selected', 'selected');
		$('#cmbTipoDocumento').next().children('a').children('span').html('Típo de documento de quien radica');
	 	$('#cmbTipoDocumento').next().children('a').attr('class', 'chzn-single chzn-default')

	 	$('#cmbClaDocumento > option[value=""]').attr('selected', 'selected');
	 	$('#cmbClaDocumento').next().children('a').children('span').html('Clase de documento a radicar');
	 	$('#cmbClaDocumento').next().children('a').attr('class', 'chzn-single chzn-default')

	 	//alert($('iframe').contens().find('body').html());
	 	$('iframe').contents().find('body').html('');
	});

	$('#rbtNormal').click(function(){
		$('#txtNombres').parent().parent().parent().show();
		$('#txtApellidos').parent().parent().parent().show();
		$('#chkMasculino').parent().parent().parent().parent().parent().parent().show();
		$('#txtDireccion').parent().parent().parent().show();
		$('#txtNumTelefono').parent().parent().parent().show();
		$('#txtNumDoc').parent().parent().parent().show();
		$('#cmbTipoDocumento').parent().parent().parent().show();
		$('#txtCorreo').parent().parent().parent().show();
	});

	$('#rbtAnonima').click(function(){
		$('#txtNombres').val('');
		$('#txtApellidos').val('');
		$('#txtDireccion').val('');
		$('#txtNumTelefono').val('');
		$('#txtNumDoc').val('');
		$('#txtCorreo').val('');

		$('#txtNombres').parent().parent().parent().hide();
		$('#txtApellidos').parent().parent().parent().hide();
		$('#chkMasculino').parent().parent().parent().parent().parent().parent().hide();
		$('#txtDireccion').parent().parent().parent().hide();
		$('#txtNumTelefono').parent().parent().parent().hide();
		$('#txtNumDoc').parent().parent().parent().hide();
		$('#cmbTipoDocumento').parent().parent().parent().hide();
		$('#txtCorreo').parent().parent().parent().hide();
	});

	$('input[type="file"]').live("change", function(){
		var msg = ValidarArchivos();

		if(msg != ""){
			ShowMessage("Formulario incompleto", msg, " icon-warning-sign", "warning");
		}
	});

	$('#btnAgregarAdjuno').click(function(){
		var cuenta = $('input[type="file"]').length + 1;
		var html = '<div class="span11" style="margin-left:2.5%;">' +
						'<label class="control-label">Archivo ' + cuenta + ', MAX 3MB</label>' +
						'<div class="controls">' +
						  '<div class="uploader">' +
						  	'<input type="file" id="file_' + cuenta + '" name="adjuntos[]" size="3072" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff, .pdf" style="opacity: 0;">' +
						  	'<span class="filename">No file selected</span>' +
						  	'<span class="action">Choose File</span>' + 
					  	'</div>' +
						'</div>'  +
					'</div>';

		$('#multiFile').append(html);
	});		

	function ValidarArchivos(){
		var msg = "";
		var msg1 = "El tamaño del Archivo ";

		$('input[type="file"]').each(function(index){

			if($(this).val() != ''){
				
				//Cambia el nombre
				var nombre = $(this).attr('value').replace(/C:\\fakepath\\/i, '');
				$(this).next().html(nombre);

				var sizeByte = this.files[0].size;
			    var siezekiloByte = parseInt(sizeByte / 1024);
			 	
			    if(siezekiloByte > parseInt($(this).attr('size'))){
			    	msg = msg + ' ' + (index + 1) + ',';
			    }
			}
			else{
				$(this).next().html("No file selected");
			}
		});

		if(msg == ""){
			return "";
		}
		else{
			return msg1 + msg + ' supera el limite permitido.';
		}
	}

	function ValidarFormulario(){
		var mensaje = "";

		if(ValidarArchivos() != ""){
			mensaje = ValidarArchivos();
		}
		else if($("#txtCantidadFolios").val() == ""){
			mensaje = "Debe ingresar la cantidad de fólios.";
			$("#txtCantidadFolios").focus();
		}
		else if(parseInt($("#txtCantidadFolios").val()) < 0) {
			mensaje = "La cantidad de folios NO puede ser negativa.";
			$("#txtCantidadFolios").focus();
		}
		else if($('#txtAsunto').val() == "" ){
			mensaje = "Debe ingresar un asunto para el radicado.";
			$("#txtAsunto").focus();
		}
		else if($('#txtAQuienDirigido').val() == "" ){
			mensaje = "Debe ingresar a quién va dirigido el radicado.";
			$("#txtAQuienDirigido").focus();
		}
		else if($('#cmbClaDocumento').val() == "" ){
			mensaje = "Debe seleccionar un tipo de documento a radicar.";
			$("#cmbClaDocumento").focus();
		}
		else if($('#txtNumOficio').val() == "" ){
			mensaje = "Debe ingresar el numero de ofício.";
			$("#txtNumOficio").focus();
		}
		else if($('#txtDescripcion').val() == "" ){
			mensaje = "Debe ingresar una descripción para el radicado.";
			$("#txtDescripcion").focus();
		}
		else if($('#rbtNormal').is(':checked')){
			
			//Valida campos de la persona
			if($('#cmbTipPersona').val() == "" ){
				mensaje = "Debe seleccionar el tipo de persona que radica.";
				$("#cmbTipPersona").focus();
			}
			else if($('#cmbTipoDocumento').val() == "" ){
				mensaje = "Debe seleccionar el tipo de documento de la persona que radica.";
				$("#cmbTipoDocumento").focus();
			}
			else if(parseInt($('#txtNumDoc').val()) < 0){
				mensaje = "El número de documento NO puede ser negativo";
				$("#txtNumDoc").focus();
			}
			else if($('#txtNumDoc').val().length < 6){
				mensaje = "El número de documento debe tener por lo menos 6 digitos";
				$("#txtNumDoc").focus();
			}
			else if($('#txtNombres').val() == "" ){
				mensaje = "Debe ingresar los nombres de la persona que radica.";
				$("#txtNombres").focus();
			}
			else if($('#txtApellidos').val() == "" ){
				mensaje = "Debe ingresar los nombres de la persona que radica.";
				$("#txtApellidos").focus();
			}
			else if($('#txtDireccion').val() == "" ){
				mensaje = "Debe ingresar la dirección de residencia de la persona que radica.";
				$("#txtDireccion").focus();
			}
			else if($('#txtNumTelefono').val() == "" ){
				mensaje = "Debe ingresar el número de teléfono de quien radica.";
				$("#txtNumTelefono").focus();
			}
			else if(parseInt($('#txtNumTelefono').val()) < 0){
				mensaje = "El número de teléfono NO puede ser negativo.";
				$("#txtNumTelefono").focus();
			}
			else if($('#txtCorreo').val() == "" ){
				mensaje = "Debe ingresar el correo electrónico de quien radica.";
				$("#txtCorreo").focus();
			}
			else if(validarEmail($('#txtCorreo').val()) == -1){
				mensaje = "Este correo electrónico no es valido";
				$("#txtCorreo").focus();
			}
			else if(validarEmail($('#txtCorreo').val()) == -1){
				mensaje = "El correo electrónico proporcionado no es válido.";
				$("#txtCorreo").focus();	
			}
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

	function validarEmail( email ) {
	    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if ( !expr.test(email) ){
	        return -1;			    	
	    }
	    return 1;
	}
});

//Variable global javascipt que almacena la base_url del sitio
var base_path = '';

//Funcion que recibe la base_url del sitio
function base_site(base){
	base_path = base;		
}