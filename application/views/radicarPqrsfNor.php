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
						<a href="#">Radicación de PQRSF</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
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
						<form class="form-horizontal" action="<?php echo base_url(); ?>radicarPqrsf/RegistrarPqrsf" method="POST" enctype="multipart/form-data">
						  <fieldset>
							<legend>Datos básicos de radicación</legend>
							
							<div class="span6">
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

							<div class="span5">
								<div class="control-group">
									<label class="control-label">Típo Correspondencia</label>
									<div class="controls">
									  <label class="checkbox inline">
										<input type="radio" name="tipocorresp" id="rbtExterna" value="E" checked> Externa
									  </label>
									  <label class="checkbox inline">
										<input type="radio" name="tipocorresp" id="rbtInterna" value="I"> Interna
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
												if($documentos!= null){													
												  	foreach($documentos as $fila)
													{
											?>
														<option value="<?php echo $fila['COD_DOC']; ?>"><?php echo $fila['NOM_DOC']; ?></option>
											<?php
													}
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
										<input class="input-xlarge focused" id="txtObservacion" name="txtObservacion" type="text" style="width:100%;" placeholder="Ingrese una descripcion del radicado" maxlength="500" required>
									</div>
								</div>                     
							</div>        

							<div class="span11">
								<div class="control-group">
								  <label class="control-label" for="textarea2">Descripción</label>
								  <div class="controls">
									<textarea class="cleditor" id="txtDescripcion" name="txtDescripcion" maxlength="300" rows="3"></textarea>
								  </div>
								</div>
							</div>

							<!--<legend>Adjuntos del radicado</legend>-->
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

							<div class="span11">
								<div class="form-actions" style="width:85%;">
								  <button type="submit" id="btnGuardar" class="btn btn-primary">Guardar cambios</button>
								  <button type="reset" id="btnLimpiar" class="btn btn-primary">Limpiar</button>
								  <button type="reset" id="btnCancelar" class="btn">Cancelar</button>
								</div>
							</div>

							
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
			</div><!--/row-->
    
			<!-- content ends -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

		<footer>
			<p class="pull-right">Copyrigth <?php echo date('Y'); ?> - RadicaWeb</p>
		</footer>
</div>