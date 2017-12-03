	<!-- topbar ends -->
		<div class="container-fluid">
		<div class="row-fluid">
				
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Menú principal</li>
						<?php
							if($menus != null ){
							  	foreach($menus as $fila)
								{
						?>
									<li><a class="ajax-link" href="<?php echo base_url();?><?php echo $fila['PATH_PAG']; ?>"><i class="icon-chevron-right"></i><span class="hidden-tablet"> <?php echo $fila['NOM_PAG']; ?></span></a></li>
						<?php
								}
							}
						?>
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
						
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Inicio</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Parametrización de documentos de radicación</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Documentos de radicación</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action='' method="POST">
						  <fieldset>

						  	<a href="#" id="btnAgregarDoc" class="btn btn-success" data-toggle='modal' data-target='#myModal'><i class="icon-plus icon-white"></i> Nuevo documento</a>
						  	<div style="clear:both;">&nbsp;</boht>

							<table class="table table-striped table-bordered bootstrap-datatable datatable">
								<thead>
									<tr>
										<th>Código</th>
										<th>Nombre</th>
										<th>Orden</th>
										<th>Num días</th>
										<th>Opciones</th>
									</tr>
								</thead>   							
								<tbody>
									
										<?php
										foreach($documentos as $fila){
											$fila = "<tr>" .
														"<td class='center'>" . $fila['COD_DOC'] . "</td>" .
														"<td class='center'>" . $fila['NOM_DOC'] . "</td>" .
														"<td class='center'>" . $fila['ORD_DOC'] . "</td>" .
														"<td class='center'>" . $fila['NUM_DIAS'] . "</td>" .
														"<td class='center'> " .
															"<a class='btn btn-info' href='#' data-toggle='modal' data-target='#myModal'> ".
																"<i class='icon-edit icon-white'></i> ".
																"Editar ".
															"</a> ".
															"<a class='btn btn-success' href='#' data-toggle='modal' data-target='#myModal'> ".
																"<i class='icon-zoom-in icon-white'></i> ".
																"Visualizar ".
															"</a> ".
															"<a class='btn btn-warning' href='#' data-toggle='modal' data-target='#modalAlertas'>".
																"<i class='icon-warning-sign icon-white'></i> ".
																"Alertas ".
															"</a> ".
														"</td>" . 
													"</tr>";
											echo $fila;
										}
										?>
								</tbody>
							</table>

						  </fieldset>


						  <div class="modal hide fade" id="myModal">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">×</button>
								<h3>Parametrización - documentos de radicación</h3>
							</div>
							<div class="modal-body">
								
								<div id="mensaje" class="alert alert-error" style="display:none;">
									<button type="button" class="close" data-dismiss="">×</button>
									<strong style="float:left;">Oh snap!</strong><div style="margin-left:30%;">Change a few things up and try submitting again.</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Código documento</label><br  />
										<input class="input-xlarge focused" id="txtCodDoc" name="txtCodDoc" type="text" style="width:100%;" maxlength="3">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Nombre documento</label>
										<input class="input-xlarge focused" id="txtNomDoc" name="txtNomDoc" type="text" style="width:100%;" maxlength="100">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Orden</label>
										<input class="input-xlarge focused" id="txtOrden" name="txtOrden" type="number" style="width:100%;" maxlength="1">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Numero de días para calculo de vencimiento</label>
										<input class="input-xlarge focused" id="txtDias" name="txtDias" type="number" style="width:100%;" maxlength="1">
									</div>
								</div>

							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cerrar</a>
								<a id="btnGrabar" href="#" class="btn btn-primary">Grabar</a>
								<a id="btnActualizar" href="#" class="btn btn-primary">Actualizar</a>
							</div>
						</div>

						<div class="modal hide fade" id="modalAlertas">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">×</button>
								<h3>Parametrización - Alertas por documento</h3>
							</div>
							<div class="modal-body">
								
								<div id="msgAlerta" class="alert alert-error" style="display:none;">
									<button type="button" class="close" data-dismiss="">×</button>
									<strong style="float:left;">Oh snap!</strong><div style="margin-left:30%;">Change a few things up and try submitting again.</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Documento a parametrizar</label><br  />
										<input class="input-xlarge focused" name="codDoc" id="codDoc" type="text" style="width:100%;" maxlength="3" readonly>
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Dia antes del vencimiento</label>
										<input class="input-xlarge focused" id="txtDiaAle" name="txtDiaAle" type="number" style="width:100%;" maxlength="1">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Orden alerta</label>
										<input class="input-xlarge focused" id="txtOrdAlerta" name="txtOrdAlerta" type="number" style="width:100%;">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Color de la alerta</label>
										<input class="input-xlarge focused" id="txtColor" name="txtColor" type="color" style="width:100%;" value="#43a1da">
									</div>
								</div>

							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cerrar</a>
								<a id="btnGrabarAlerta" href="#" class="btn btn-primary">Grabar - actualizar</a>
							</div>
						</div>

						</form>   

					</div>
				</div><!--/span-->
			</div><!--/row-->
    
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
				
		<hr>

		

		<footer>
			<p class="pull-right">Copyrigth <?php echo date('Y'); ?> - RadicaWeb</p>
		</footer>
		
	</div><!--/.fluid-container-->