$(document).ready(function(){

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

	//Asignar
	$('table tbody a.btn-info').live('click', function(){
		$('#pnlSeguimiento').show();
		$('#pnlTabla').hide();

		var numTick = "";
		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 1:
					$('#txtNumTick').val($(this).text());
					numTick = $('#txtNumTick').val();
					$('#txxtCantFol').focus();
            		break;
            }
        });
		
        $.ajax({
			type: "POST",
		 	url: base_path + 'seguimientoPqrsf/GetInfoPqrsf',
		 	data: {numTick: numTick}, 
		 	success: function(resp) { 

	 			
	 			$('#txtFecRac').val('');
	 			$('#txtAsunto').val('');
	 			$('#txtClaDoc').val('');
	 			$('#txtPeticionario').val('');
	 			$('#txtNumOfi').val('');
	 			$('#txtTieneAnexos').val('');
	 			$('#txtTipo').val('');
	 			$('#tablaSeguimiento').html('');
	 			$('#tablaAdjuntos').html('');

	 			var infoFun = jQuery.parseJSON(resp);
                 console.log(infoFun);
	 			//Llena el formulario
	 			$('#txtFecRac').val(infoFun.FEC_RAC);
	 			$('#txtAsunto').val(infoFun.ASU_PQR);
	 			$('#txtClaDoc').val(infoFun.NOM_DOC);
	 			$('#txtPeticionario').val(infoFun.NOM_PER);
	 			$('#txtNumOfi').val(infoFun.NUM_OFI_ENT);
	 			$('#txtTieneAnexos').val(infoFun.ANEXO);
	 			$('#txtTipo').val(((infoFun.COP_PQR == "S") ? "Copia de petición" : "Original de petición"));
	 			$('#tablaSeguimiento').html(infoFun.TAB_SEG);
	 			$('#tablaAdjuntos').html(infoFun.anexos);

	 		},
			error: function(){
				alert("error consultando la información");
			}
	 	});

	});
$('#infoAdjuntos').on('click', function(){
	alert('vvv');
		numTick = $(this).data('id');
		$.ajax({
			type: "POST",
		 	url: base_path + 'seguimientoPqrsf/Getadjuntos',
		 	data: {numTick: numTick}, 
		 	success: function(resp) { 

	 			$('#tablaAdjuntos2').html(resp);

	 		},
			error: function(){
				alert("error consultando la información");
			}
	 	});
		
	});
	
	$('#btnFinalizar').click(function(){
		$('#salidaCorrespondencia').modal('hide');
		ShowMessage("Confirmación transacción", "Se ha registrado el seguimiento y la salida de correspondencia con éxito.", "icon-warning-sign", "success");
		setTimeout(function () {
			$('form').submit();
        }, 2000);
	});

	$('#btnGuardar').click(function(event) { 

		var msg = ValidarFormulario();
		if(msg != ""){
			ShowMessage("Formulario incompleto", msg, " icon-warning-sign", "warning");
		}
		else{

			(new PNotify({
			    title: 'Mensaje de confirmación',
			    text: 'Desea generar salida de correspondencia ahora mismo?',
			    icon: 'glyphicon glyphicon-question-sign',
			    hide: false,
			    confirm: {
			    	confirm: true
			    },
			    buttons: {
			        closer: false,
			        sticker: false
			    },
			    history: {
			        history: false
			    }
			})).get().on('pnotify.confirm', function() {
			    
			    /*Abre el formulario modal pidiendo la información del seguimiento*/
			    $('#salidaCorrespondencia').modal({
				  keyboard: false
				});

			}).on('pnotify.cancel', function() {
			   	
			   	//Genera el submit que guarda la informacion
				ShowMessage("Confirmación transacción", "Se ha registrado el seguimiento exitosamente", "icon-warning-sign", "success");
				setTimeout(function () {
					$('form').submit();
	            }, 2000);

			});
		}
	});

	$('#btnCancelar').click(function(){ 
		$('#pnlSeguimiento').hide();
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
		
		if(ValidarArchivos() != ""){
			mensaje = ValidarArchivos();
		}
		else if( $('#txxtCantFol').val() == ""){
			mensaje = "Debe ingresar la cantidad de folios.";
			$('#txxtCantFol').focus();
		}
		else if($('#txtAsuOfi').val() == ""){
			mensaje = "Debe ingresar el asunto del seguimiento.";
			$('#txtAsuOfi').focus();
		}
		else if($('#txtDescOfi').val() == ""){
			mensaje = "Debe ingresar luna descriptción para el seguimiento.";
			$('#txtDescOfi').focus();
		}
		return mensaje;
	}

	$('#tbSeguimientos tbody a.btn-success').live('click', function() {
		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 0:
					$('#txtFechaSegVisual').val('');
					$('#txtFechaSegVisual').val($(this).text());
            		break;
            	case 1:
					$('#txtCantOfiVisual').val('');
					$('#txtCantOfiVisual').val($(this).text());
            		break;
            	case 2:
					$('#txtAsuVisual').val('');
					$('#txtAsuVisual').val($(this).text());
            		break;
            	case 3:
					$('#txtDescVisual').val('');
					$('#txtDescVisual').val($(this).text());
            		break;
            }
        });		
	});

});

//Variable global javascipt que almacena la base_url del sitio
var base_path = '';

//Funcion que recibe la base_url del sitio
function base_site(base){
	base_path = base;		
}