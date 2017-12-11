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
						<a href="#">Seguimiento Pqrsf</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Casos disponibles a seguimiento </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action='<?php  echo base_url(); ?>seguimientoPqrsf/RegistrarSeguimientoPqrsf' method="POST"  enctype="multipart/form-data">
														  
						  <fieldset>

						  	<div id="pnlTabla">

								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									<thead>
										<tr>
											<th>Fecha</th>
											<th>No Tick</th>
											<th>Documento</th>
											<th>Asunto</th>
											<th>Quien radicó</th>
											<th>Identificación</th>
											<th>Asignación</th>
											<th>Opciones</th>
										</tr>
									</thead>   							
									<tbody>
										
											<?php
											if($listaPqrsf != null){
												foreach($listaPqrsf as $fila){
													$fila = "<tr>" .
																"<td class='center'>" . $fila['FEC_RAC_PQR'] . "</td>" .
																"<td class='center'>" . $fila['NUM_TIC_PQR'] . "</td>" .
																"<td class='center'>" . $fila['NOM_DOC'] . "</td>" .
																"<td class='center'>" . $fila['ASU_PQR'] . "</td>" .
																"<td class='center'>" . $fila['NOM_PER'] . "</td>" .
																"<td class='center'>" . $fila['NUM_DOC_PER'] . "</td>" .
																"<td class='center'>" . $fila['NOM_FUN'] . "</td>" .
																"<td class='center'> " .
																	"<a class='btn btn-info' href='#'> ".
																		"<i class='icon-zoom-in icon-white'></i> ".
																		"Seguimiento".
																	"</a> ".
																	"<a class='btn btn-success' href='#'> ".
																		
																		"Enviar email".
																	"</a> ".
																"</td>" . 
															"</tr>";
														echo $fila;
												}
											}
											?>
									</tbody>
								</table>
							</div>

							<div id="pnlSeguimiento" style="display:none;">
								
								<div>
									<div class="row" style="margin-left: 0px;">

									<legend>Información del radicado</legend>
									<div class="span6" style="margin-left:0px;">
			                            <div class="control-group">
											<label class="control-label" for="selectError2">No radicado</label>
											<div class="controls">
												<input class="input-xlarge focused" id="txtNumTick" name="txtNumTick" type="text" style="width:100%;" maxlength="20" readonly="readonly">
											</div>
										</div>
		                            </div>
		                            <div class="span5">
			                            <div class="control-group">
											<label class="control-label" for="selectError2">Fecha del radicado</label>
											<div class="controls">
												<input class="input-xlarge focused" id="txtFecRac" name="txtFecRac" type="text" style="width:100%;" maxlength="20" readonly="readonly">
											</div>
										</div>
		                            </div>

		                            <div class="span6" style="margin-left:0px;">
			                            <div class="control-group">
											<label class="control-label" for="selectError2">Asunto</label>
											<div class="controls">
												<input class="input-xlarge focused" id="txtAsunto" name="txtAsunto" type="text" style="width:100%;" maxlength="20" readonly="readonly">
											</div>
										</div>
		                            </div>
		                            <div class="span5">
			                            <div class="control-group">
											<label class="control-label" for="selectError2">Clase documento</label>
											<div class="controls">
												<input class="input-xlarge focused" id="txtClaDoc" name="txtClaDoc" type="text" style="width:100%;" maxlength="20" readonly="readonly">
											</div>
										</div>
		                            </div>

		                             <div class="span6" style="margin-left:0px;">
			                            <div class="control-group">
											<label class="control-label" for="selectError2">Nombre Peticionario</label>
											<div class="controls">
												<input class="input-xlarge focused" id="txtPeticionario" name="txtPeticionario" type="text" style="width:100%;" maxlength="20" readonly="readonly">
											</div>
										</div>
		                            </div>
		                            <div class="span5">
			                            <div class="control-group">
											<label class="control-label" for="selectError2">Número de oficio</label>
											<div class="controls">
												<input class="input-xlarge focused" id="txtNumOfi" name="txtNumOfi" type="text" style="width:100%;" maxlength="20" readonly="readonly">
											</div>
										</div>
		                            </div>

		                            <div class="span6" style="margin-left:0px;">
			                            <div class="control-group">
											<label class="control-label" for="selectError2">Tiene anexos?</label>
											<div class="controls">
												<input class="input-xlarge focused" id="txtTieneAnexos" name="txtTieneAnexos" type="text" style="width:100%;" maxlength="20" readonly="readonly">
											</div>
										</div>
		                            </div>
		                            <div class="span5">
			                            <div class="control-group">
											<label class="control-label" for="selectError2">Tipo</label>
											<div class="controls">
												<input class="input-xlarge focused" id="txtTipo" name="txtTipo" type="text" style="width:100%;" maxlength="20" readonly="readonly">
											</div>
										</div>
		                            </div>
		                            </div>
		                            <div class="row" style="margin-left: 0px;">
		                            	
		                            

		                            <legend>Adjuntos</legend>
									<div class="span12" style="margin-left:0px;">
			                            <div id="tablaAdjuntos"></div>
		                            </div>

		                            </div>

		                            <legend>Datos básicos del seguimiento</legend>
									<div class="span6" style="margin-left:0px;">
			                            <div class="control-group">
											<label class="control-label" for="selectError2">Fecha de respuesta</label>
											<div class="controls">
													<input type="text" class="input-xlarge datepicker" id="txtFechaRes" name="txtFechaRes" value="<?php echo date('Y-m-d');?>" style="width:100%;" maxlength="10">
											</div>
										</div>
		                            </div>
		                            <div class="span5" style="margin-left:0px;">
			                            <div class="control-group">
											<label class="control-label" for="selectError2">Cantidad de folios</label>
											<div class="controls">
												<input class="input-xlarge focused" id="txxtCantFol" name="txxtCantFol" type="number" style="width:100%;" maxlength="20">
											</div>
										</div>
		                            </div>

		                            <div class="span11" style="margin-left:0px;">
			                            <div class="control-group">
											<label class="control-label" for="selectError2">Asunto del oficio</label>
											<div class="controls">
												<input class="input-xlarge focused" id="txtAsuOfi" name="txtAsuOfi" type="text" style="width:97%;" maxlength="200" >
											</div>
										</div>
		                            </div>

		                            <div class="span11" style="margin-left:0px;">
			                            <div class="control-group">
											<label class="control-label" for="selectError2">Descripción del oficio</label>
											<div class="controls">
												<textarea class="input-xlarge focused" id="txtDescOfi" name="txtDescOfi" rows="5" style="width:97%;" maxlength="500"></textarea>
											</div>
										</div>
		                            </div>

                            	</div>

                            	<div class="span11">
									<a href="#" id="btnAgregarAdjuno" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar más adjuntos</a>
									<a href="#" id="btnEliminarAdjunto" class="btn btn-danger"><i class="icon-trash icon-white"></i> Eliminar seleccionados</a>
								</div>
								<div style="clear:both;">&nbsp;</div>

								<div id="multiFile">
									<div class="span11" style="margin-left:2.5%;">
										<label class="control-label">Archivo 1, MAX 3MB</label>
										<div class="controls">
										  <input type="file" name="adjuntos[]" size="3072" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff, .pdf">
										</div>
									</div>
								</div>
	                            <div style="clear:both;">&nbsp;</div>

								<legend>Seguimientos del caso</legend>
								<div id="tablaSeguimiento" class="span11">

								</div>
	                            <div style="clear:both;">&nbsp;</div>

								<div class="form-actions">
								  <input type="button" id="btnGuardar" class="btn btn-primary" value="Guardar seguimiento funcionario" />
								  <input type="button" class="btn" id="btnCancelar" value="Cancelar" />
								</div>

							</div>
						  
						  </fieldset>

						  <div class="modal hide fade" id="salidaCorrespondencia">
							<div class="modal-header" style="text-align:center">
								<button type="button" class="close" data-dismiss="">×</button>
								<h3>Datos de salida de correspondencia</h3>
							</div>
							<div class="modal-body">
								
								<div id="mensaje" class="alert alert-error" style="display:none;">
									<button type="button" class="close" data-dismiss="">×</button>
									<strong style="float:left;">Oh snap!</strong><div style="margin-left:30%;">Change a few things up and try submitting again.</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Fecha</label><br  />
										<input class="input-xlarge datepicker" id="txtFecSalCor" name="txtFecSalCor" type="text" style="width:100%;" maxlength="3" value="<?php echo date('Y-m-d'); ?>">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Cantidad de folios</label>
										<input class="input-xlarge focused" id="txtCantFolSalCor" placeholder="Cantidad de folios" name="txtCantFolSalCor" type="number" style="width:100%;" maxlength="100">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Asunto</label>
										<input class="input-xlarge focused" id="txtAsuntoSalCor" name="txtAsuntoSalCor"  placeholder="Asunto salida de correspondencia" type="text" style="width:100%;" maxlength="200">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Observaciones</label>
										<textarea class="input-xlarge focused" id="txtObsSalCor" name="txtObsSalCor"  placeholder="Observaciones salida de correspondencia" rows="4" style="width:100%;" maxlength="500"></textarea>
									</div>
								</div>

							</div>
							<div class="modal-footer">
								<a id="btnFinalizar" href="#" class="btn btn-primary">Finalizar Operación</a>
							</div>
						</div>

						</form>   

						<div class="modal hide fade" id="infoSeguimiento">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">×</button>
								<h3>Visualización de seguimiento</h3>
							</div>
							<div class="modal-body">

								<div id="mensaje" class="alert alert-error" style="display:none;">
									<button type="button" class="close" data-dismiss="">×</button>
									<strong style="float:left;">Oh snap!</strong><div style="margin-left:30%;">Change a few things up and try submitting again.</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Fecha Seguimiento</label>
										<input class="input-xlarge focused" id="txtFechaSegVisual" name="txtFechaSegVis" type="text" style="width:100%;" readonly="readonly">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Cantidad de oficios</label>
										<input class="input-xlarge focused" id="txtCantOfiVisual" name="txtCantOfiVisual" type="text" style="width:100%;" readonly="readonly">
									</div>
								</div>
								
								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Asunto seguimiento</label>
										<input class="input-xlarge focused" id="txtAsuVisual" name="txtAsuVisual" type="text" style="width:100%;" readonly="readonly">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Descripcion seguimiento</label>
										<textarea class="input-xlarge focused" id="txtDescVisual" name="txtDescVisual" style="width:100%;" rows="3" readonly="readonly"></textarea>
									</div>
								</div>

							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cerrar ventana</a>
							</div>
						</div>






						<div class="modal hide fade" id="infoAdjuntos">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">×</button>
								<h3>Adjuntos de seguimiento</h3>
							</div>
							<div class="modal-body">

								<div class="tablaAdjuntos2"></div>

							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cerrar ventana</a>
							</div>
						</div>

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