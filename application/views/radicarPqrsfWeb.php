		<div class="container-fluid">
		<div class="row-fluid">
			
			<div style="width:100%;text-align:center;">
				<h1>Radicación de PQRSF web</h1>
				<h2>Alcaldia Roncesvalles Tolima</h2>
			</div><br />
						
			<div style="float:left;width:12%;">&nbsp;</div>
			<div class="row-fluid sortable" style="width:80%;float:left;">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Radicación de PQRSF</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form id="form2" class="form-horizontal" action="<?php echo base_url(); ?>pqrsfWeb/RegistrarPqrsf" method="POST" enctype="multipart/form-data">
						  <fieldset>
							<legend>Datos básicos de radicación</legend>
							
							<div class="span11" style="display:none;">
								<div class="control-group">
									<label class="control-label">Típo de radicación</label>
									<div class="controls">
									  <label class="checkbox inline">
										<input type="radio" name="tiporadica" id="rbtNormal" value="normal" checked> Normal
									  </label>
									  <label class="checkbox inline">
										<input type="radio" name="tiporadica" id="rbtAnonima" value="anonima"> Anónima
									  </label>
									</div>
								</div>
							</div>

							<div class="span11" >
								<div class="control-group">
									<label class="control-label">Típo de correspondencia</label>
									<div class="controls">
									  <label class="checkbox inline">
										<input type="radio" name="tipoCorrespondencia" id="rbtExterna" value="E" checked> Externa
									  </label>
									  <label class="checkbox inline">
										<input type="radio" name="tipoCorrespondencia" id="rbtInterna" value="I"> Interna
									  </label>
									</div>
								</div>
							</div>

							<div class="span6">
								<div class="control-group">
								<label class="control-label" for="date01">Fecha radicación</label>
								<div class="controls">
								<input type="text" class="input-xlarge focused" id="txtFecha" name="txtFecha" value="<?php echo date('Y-m-d');?>" style="width:100%;" maxlength="10" readonly="readonly">
								</div>
								</div>
							</div>

							<div class="span5">
								<div class="control-group">
	                            <label class="control-label" for="focusedInput">Cantidad de folios</label>
	                            <div class="controls">
		                            <input class="input-xlarge focused" id="txtCantidadFolios" name="txtCantidadFolios" type="number" style="width:100%;" maxlength="3" required>
	                            </div>
	                            </div>
							</div>

							<div class="span11">
								<div class="control-group">
								<label class="control-label" for="focusedInput">Asunto</label>
								<div class="controls">
									<input class="input-xlarge focused" id="txtAsunto" name="txtAsunto" type="text" style="width:100%;" placeholder="Ingrese el asunto de la radicación" maxlength="200" required>
								</div>
								</div>
							</div>

							<div class="span11">
	                            <div class="control-group">
								<label class="control-label" for="focusedInput">A quien va dirigido?</label>
								<div class="controls">
										<select data-placeholder="Dependencia a que va dirigido" id="cmbAquienDirigido" name="cmbAquienDirigido" data-rel="chosen" style="width:101.5%;" required>
											<optgroup label="Seleccione el jefe de la dependencia a quien va dirigido">
											<option value=""></option>
											<?php
												if($dependencias != null ){
												  	foreach($dependencias as $fila)
													{
											?>
														<option value="<?php echo $fila['COD_FUN']; ?>"><?php echo $fila['NOM_FUN']; ?></option>
											<?php
													}
												}
											?>
											</optgroup>
									  </select>
								</div>
								</div>
							</div>

							<div class="span11">
	 							<div class="control-group">
									<label class="control-label" for="cmbClaDocumento">Clase de documento</label>
									<div class="controls">
										<select data-placeholder="Clase de documento a radicar" id="cmbClaDocumento" name="cmbClaDocumento" data-rel="chosen" style="width:101.5%;" required>
											<optgroup label="Documentos de radicación">
											<option value=""></option>
											<?php
											  	foreach($documentos as $fila)
												{
											?>
													<option value="<?php echo $fila['COD_DOC']; ?>"><?php echo $fila['NOM_DOC']; ?></option>
											<?php
												}
											?>
											</optgroup>
									  </select>
									</div>
								  </div>

							</div>

							<div class="span6">
	                            <div class="control-group">
								<label class="control-label" for="focusedInput">Numero de oficio</label>
								<div class="controls">
									<input class="input-xlarge focused" id="txtNumOficio" name="txtNumOficio" type="text" style="width:100%;" placeholder="Número o código que proviene de la entidad externa" maxlength="30" required>
								</div>
								</div>
							</div>

							<div class="span5">
								 <div class="control-group">
									<label class="control-label" for="selectError3">Típo de persona</label>
									<div class="controls">
									  <select id="cmbTipPersona" name="cmbTipPersona" style="width:104%;">
									  	<option value=""></option>
										<?php
										  	foreach($tiposPersona as $fila)
											{
										?>
												<option value="<?php echo $fila['COD_TIP_PER']; ?>"><?php echo $fila['NOM_TIP_PER']; ?></option>
										<?php
											}
										?>
									  </select>
									</div>
								  </div>
							</div>

							<div class="span6">
	                        	<div class="control-group">
									<label class="control-label" for="cmbTipoDocumento">Tipo de documento</label>
									<div class="controls">
										<select data-placeholder="Típo de documento de quien radica" id="cmbTipoDocumento" name="cmbTipoDocumento" data-rel="chosen" style="width:103%;">
											<optgroup label="Típos de documentos">
												<option value=""></option>
												<?php
													foreach($tiposDocumento as $fila)
												{
												?>
													<option value="<?php echo $fila['COD_TIP_DOC']; ?>"><?php echo $fila['NOM_TIP_DOC']; ?></option>
												<?php
												}
												?>
											</optgroup>
									  </select>
									</div>
								  </div>
							</div>

							<div class="span5">

	                            <div class="control-group">
								<label class="control-label" for="focusedInput">Numero de documento</label>
								<div class="controls">
									<input class="input-xlarge focused" id="txtNumDoc" name="txtNumDoc" type="number" style="width:100%;">
								</div>
								</div>
							</div>
                            

							<div class="span6">
								<div class="control-group">
								<label class="control-label" for="focusedInput">Nombres</label>
								<div class="controls">
									<input class="input-xlarge focused" id="txtNombres" name="txtNombres" type="text" style="width:100%;">
								</div>
								</div>  
							</div>

							<div class="span5">
								 <div class="control-group">
								<label class="control-label" for="focusedInput">Apellidos</label>
								<div class="controls">
									<input class="input-xlarge focused" id="txtApellidos" name="txtApellidos" type="text" style="width:100%;">
								</div>
								</div>    
							</div>


							<div class="span6">
								<div class="control-group">
									<label class="control-label">Género</label>
									<div class="controls">
									  <label class="checkbox inline">
										<input type="radio" name="genero" id="chkMasculino" value="M" checked> Masculino
									  </label>
									  <label class="checkbox inline">
										<input type="radio" name="genero" id="chkFemenino" value="F"> Femenino
									  </label>
									</div>
								</div>
							</div>

							<div class="span5">
	                            <div class="control-group">
								<label class="control-label" for="focusedInput">Dirección de contacto</label>
								<div class="controls">
									<input class="input-xlarge focused" id="txtDireccion" name="txtDireccion" type="text" style="width:100%;">
								</div>
								</div>   
							</div>

							<div class="span6">
								<div class="control-group">
								<label class="control-label" for="focusedInput">Numero telefono</label>
								<div class="controls">
									<input class="input-xlarge focused" id="txtNumTelefono" name="txtNumTelefono" type="number" style="width:100%;" placeholder="Numero de telefono">
								</div>
								</div>
							</div>

							<div class="span5">

                            	<div class="control-group">
									<label class="control-label" for="prependedInput">Correo electrónico</label>
									<div class="controls">
									  	<div class="input-prepend" style="width:100%;">
									  		<input class="input-xlarge focused" id="txtCorreo" name="txtCorreo" type="text" style="width:100%;" placeholder="Correo electronico">
										</div>
									</div>
								</div>
							</div>

							<div class="span11">
								<div class="control-group">
									<label class="control-label" for="focusedInput">Observaciones</label>
									<div class="controls">
										<input class="input-xlarge focused" id="txtObservacion" name="txtObservacion" type="text" style="width:100%;" placeholder="Ingrese una descripcion del radicado" maxlength="300" required>
									</div>
								</div>                     
							</div>        

							<div class="span11">
								<div class="control-group">
								  <label class="control-label" for="textarea2">Descripción</label>
								  <div class="controls">
									<textarea class="cleditor" id="txtDescripcion" name="txtDescripcion" maxlength="500" rows="3"></textarea>
								  </div>
								</div>
							</div>

							<legend>Adjuntos del radicado</legend>
							<div class="span11">
								<a href="#" id="btnAgregarAdjuno" class="btn btn-success"><i class="icon-plus icon-white"></i> Agregar más adjuntos</a>
								<a href="#" id="btnEliminarAdjunto" class="btn btn-danger"><i class="icon-trash icon-white"></i> Eliminar seleccionados</a>
							</div>
							<div style="clear:both;">&nbsp;</div>

							<div id="multiFile">
								<div class="span11" style="margin-left:2.5%;">
									<label class="control-label">Archivo 1, MAX 3MB</label>
									<div class="controls">
									  <input type="file" id="file_1" name="adjuntos[]" size="3072" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff, .pdf">
									</div>
								</div>
							</div>

							<div style="clear:both;">&nbsp;</div>

							<div class="span11">
								<div class="form-actions" style="width:85%;">
								  <button type="submit" id="btnGuardar" class="btn btn-primary">Radicar petición</button>
								  <button type="reset" id="btnLimpiar" class="btn btn-primary">Limpiar</button>
								</div>
							</div>

							
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
			</div><!--/row-->
    
		</div><!--/fluid-row-->
				
		<hr>
