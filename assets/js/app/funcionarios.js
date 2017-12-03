$(document).ready(function(){

	$('.chzn-container-single').css('width', '100%');
	$('.chzn-drop').css('width', '100%');
	$('.chzn-drop').find('input[type="text"]').css('width', '87%');

	//Editar
	$('table tbody a.btn-info').live('click', function(){
		$('#mensaje').hide();
		$('#btnActualizar').show();
		$('#btnGrabar').hide();
		$('#txtNomFun').attr('readonly', false);
		$('#txtnumDoc').attr('readonly', false);
		$('#txtLogin').attr('readonly', true);
		
		//Limpia los comboBox
		$('#cmbDependencia').attr('readonly', true);
		$('#cmbRolFun').attr('readonly', true);

		$('#txtNomFun').focus();
		Limpiar();

		//Obtiene el código del funcionario
		var codFun = "";
		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 0:
                	codFun = $(this).text();
                	break;
                }
        });

		//Realiza la peticion ajax, consultando la información necesaria del funcionario
		$.ajax({
				type: $('form').attr("method"),
			 	url: base_path + 'funcionarios/GetInfoFuncionario',
			 	data: {codFun: codFun}, 
			 	success: function(resp) { 
		 			var infoFun = jQuery.parseJSON(resp);

		 			//Llena el formulario
		 			$('#txtNomFun').val(infoFun.NOM_FUN);
		 			$('#txtnumDoc').val(infoFun.NUM_DOC_FUN);
		 			$('#txtLogin').val(infoFun.COD_FUN);
					
					//infoFun.COD_DEP;
					$('#cmbDependencia').val(infoFun.COD_DEP);
					$('#cmbDependencia').next().children('a').children('span').html($("#cmbDependencia option:selected").html());
	 				$('#cmbDependencia').next().children('a').attr('class', 'chzn-single');

	 				$('#cmbRolFun').val(infoFun.COD_ROL);
					$('#cmbRolFun').next().children('a').children('span').html($("#cmbRolFun option:selected").html());
	 				$('#cmbRolFun').next().children('a').attr('class', 'chzn-single');

	 				//Selecciona los radio correspondientes
	 				if(infoFun.TIPO_FUN == "P"){
	 					$('#rbtPlanta').prop("checked", true);

	 					$('#rbtPlanta').parent().removeClass();
	 					$('#rbtContratista').parent().removeClass('checked');
	 					$('#rbtPlanta').parent().addClass('checked');
	 				}
	 				else{			 					
	 					$('#rbtContratista').prop("checked", true);

	 					$('#rbtContratista').parent().removeClass();
	 					$('#rbtPlanta').parent().removeClass('checked');
	 					$('#rbtContratista').parent().addClass('checked');	
	 				}
	 				
					if(infoFun.JEF_FUN == "S"){
	 					$('#rbtSi').prop("checked", true);

	 					$('#rbtSi').parent().removeClass();
	 					$('#rbtNo').parent().removeClass('checked');
	 					$('#rbtSi').parent().addClass('checked');
	 				}
	 				else{			 					
	 					$('#rbtNo').prop("checked", true);

	 					$('#rbtNo').parent().removeClass();
	 					$('#rbtSi').parent().removeClass('checked');
	 					$('#rbtNo').parent().addClass('checked');	
	 				}
			 	},
			 	error: function(){
			 		alert("error");
			 	}
		 });
	});

	//Inactivar
	$('table tbody a.btn-warning').live('click', function(){
		
		//Obtiene le codigo del funcionario
		var codFun = "";
		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 0:
                	codFun = $(this).text();
                	break;
                }
        });

		$.ajax({
			type: $('form').attr("method"),
		 	url: base_path + 'funcionarios/ActEstadoFuncionario',
		 	data: {codFun: codFun, estado: 'I'}, 
		 	success: function(resp) { 
		 		
		 		new PNotify({
				    title: "Confirmación operación",
				    text: resp,
				    icon: "icon-ok-circle",
				    type: "success"
				});

				//Actualizamos la página
				setTimeout(function () {
					location.reload();
                },	1000);
			},
			error: function(){
				alert("Error");
			}
		});
	});

	//Activar
	$('table tbody a.btn-success').live('click', function(){
		
		//Obtiene le codigo del funcionario
		var codFun = "";
		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 0:
                	codFun = $(this).text();
                	break;
                }
        });

		$.ajax({
			type: $('form').attr("method"),
		 	url: base_path + 'funcionarios/ActEstadoFuncionario',
		 	data: {codFun: codFun, estado: 'A'}, 
		 	success: function(resp) { 
		 		
		 		new PNotify({
				    title: "Confirmación operación",
				    text: resp,
				    icon: "icon-ok-circle",
				    type: "success"
				});

				//Actualizamos la página
				setTimeout(function () {
					location.reload();
                },	1000);
			},
			error: function(){
				alert("Error");
			}
		});
	});

	//Agregar nuevo funcionario
	$("#btnAgregarFun").click(function(){
		$('#btnGrabar').show();
		$('#btnActualizar').hide();
		$('#txtNomFun').attr('readonly', false);
		$('#txtnumDoc').attr('readonly', false);
		$('#txtLogin').attr('readonly', false);
		Limpiar();
	});

	function Limpiar(){
		$('#txtNomFun').val('');
		$('#txtnumDoc').val('');
		$('#txtLogin').val('');

		//Limpia los comboBox
		$('#cmbDependencia').val('');
		$('#cmbDependencia').next().children('a').children('span').html('Dependencia del funcionario');
	 	$('#cmbDependencia').next().children('a').attr('class', 'chzn-single chzn-default');

	 	$('#cmbRolFun').val('');
		$('#cmbRolFun').next().children('a').children('span').html('Rol del funcionario');
	 	$('#cmbRolFun').next().children('a').attr('class', 'chzn-single chzn-default');
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
			 	url: base_path + 'funcionarios/ActualizarFuncionario',
			 	data: $('form').serialize(), 
			 	success: function(resp) { 
			 		
					if(resp != ""){
						ShowMessage("Formulario incompleto", resp, "alert alert-error");
			 		}
			 		else{

						ShowMessage("Confirmación opeación", "Se ha actualizado con éxito.", "alert alert-success");

						//Actualizamos la página
						setTimeout(function () {
							location.reload();
                        }, 1000);
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
			 	url: base_path + 'funcionarios/AgregarFuncionario',
			 	data: $('form').serialize(), 
			 	success: function(resp) { 
			 		
			 		if(resp != ""){
						ShowMessage("Confirmación opeación", resp, "alert alert-error");
			 		}
			 		else{				 			
						
						ShowMessage("Confirmación opeación", "Se ha registrado el funcionario con éxito.", "alert alert-success");
						//Actualizamos la página
						setTimeout(function () {
							location.reload();
                        }, 1000);					 		
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

		if($("#txtNomFun").val() == ""){
			mensaje = "Debe ingresar el nombre del funcionario.";
			$("#txtNomFun").focus();
		}
		else if($('#txtnumDoc').val() == "" ){
			mensaje = "Debe ingresar el numero de documento del funcionario.";
			$("#txtnumDoc").focus();
		}
		else if($('#txtnumDoc').val().length < 6 ){
			mensaje = "Este campo debe contener más de 6 caracteres.";
			$("#txtnumDoc").focus();
		}
		else if( parseInt($('#txtnumDoc').val()) < 0 ){
			mensaje = "El numero de documento ser positivo.";
			$("#txtnumDoc").focus();
		}
		else if($('#txtLogin').val() == "" ){
			mensaje = "Debe ingresar el login de usuario del funcionario.";
			$("#txtLogin").focus();
		}
		if($('#cmbDependencia').val() == "" ){
			mensaje = "Debe seleccionar la dependencia del funcionario.";
			$("#cmbDependencia").focus();
		}
		else if($('#cmbRolFun').val() == "" ){
			mensaje = "Debe seleccionar el rol de usuario del funcionario.";
			$("#cmbRolFun").focus();
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