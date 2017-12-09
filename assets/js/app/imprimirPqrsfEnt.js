$(document).ready(function(){

	function printdiv(printpage)
	{
		var headstr = "<html><head><title></title></head><body>";
		var footstr = "</body>";
		var newstr = document.all.item(printpage).innerHTML;
		var oldstr = document.body.innerHTML;
		document.body.innerHTML = headstr+newstr+footstr;
		window.print();
		document.body.innerHTML = oldstr;
		return false;
	}

	//Imprimir
	$('table tbody a.btn-info').live('click', function(){
		var numTick = '';
		$(this).parent().parent().children("td").each(function (index) {
            switch (index) {
                case 2:
                	numTick = $(this).text();
                	break;
            }
        });

		/*
		Llenamos el contenido del div con el resultado de la petición Ajax
		*/
		$.ajax({
			type: 'POST',
		 	url: base_path + 'seguimientoPqrsf/GetInfoPqrsf',
		 	data: {numTick: numTick, imp:1}, 
		 	success: function(resp) { 

		 		var infoPqrsf = jQuery.parseJSON(resp);
		 		$('#pnlImpresion').show();
		 		var contenido = '<div style="text-alig:left;float:right;">' +
		 						'<h4>ALCALDIA MUNICIPAL RONCESVALLES TOLIMA</h5> ' + 
		 						'<p style="margin-top: -2px;">Asunto         : ' + infoPqrsf.NOM_DOC + ' - Radicación de Correspondencia.</p>' + 
		 						'<p style="margin-top: -10px;">Fecha-Hora    : ' + infoPqrsf.HOR_RAC_PQR + '</p>' + 
		 						'<p style="margin-top: -10px;">Radicado      : ' + infoPqrsf.PRE_DEP + '-' + infoPqrsf.NUM_PQR  + '-' + infoPqrsf.ANIO_PQR + '</p>' + 
		 						'<p style="margin-top: -10px;">Anexos        : ' + infoPqrsf.ANEXO + '</p>' + 
		 						'<p style="margin-top: -10px;">No. Folios    : ' + infoPqrsf.CAN_FOL_PQR + '</p>' + 
		 						'<p style="margin-top: -10px;">Quien recibe  : ' + infoPqrsf.NOM_FUN + '</p>' + 
		 						'</div>';
		 		$('#pnlImpresion').html(contenido);

				printdiv('pnlImpresion'); 
		 		$('#pnlImpresion').hide();
		 		location.reload();
				
			},
			error: function(){
				alert("Error");
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