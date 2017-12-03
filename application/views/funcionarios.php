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
						<a href="#">Funcionarios del sistema</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Administración de funcionarios del sistema </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action='' method="POST">
						  <fieldset>

						  	<a href="#" id="btnAgregarFun" class="btn btn-success" data-toggle='modal' data-target='#myModal'><i class="icon-plus icon-white"></i> Nuevo usuario</a>
						  	<div style="clear:both;">&nbsp;</boht>

							<table class="table table-striped table-bordered bootstrap-datatable datatable">
								<thead>
									<tr>
										<th>Login</th>
										<th>Nombre</th>
										<th>Documento</th>
										<th>Dependencia</th>
										<th>Jefe?</th>
										<th>Estado</th>
										<th>Opciones</th>
									</tr>
								</thead>   							
								<tbody>
									<?php
									if($listaFun != null){

										foreach($listaFun as $fila){
											$fila = "<tr>" .
														"<td class='center'>" . $fila['COD_FUN'] . "</td>" .
														"<td class='center'>" . $fila['NOM_FUN'] . "</td>" .
														"<td class='center'>" . $fila['NUM_DOC_FUN'] . "</td>" .
														"<td class='center'>" . $fila['NOM_DEP'] . "</td>" .
														"<td class='center'>" . $fila['JEF_FUN'] . "</td>" .
														"<td class='center'>" . $fila['EST_USU'] . "</td>" .
														"<td class='center'> " .
															"<a class='btn btn-info' href='#' data-toggle='modal' data-target='#myModal'> ".
																"<i class='icon-edit icon-white'></i> ".
																"Editar ".
															"</a> ".
															"<a class='btn btn-" . (strcmp($fila['EST_USU'], "Activo") == 0 ? "warning" : "success") . "' href='#'> ".
																"<i class='icon-hand-up icon-white'></i>".
																(strcmp($fila['EST_USU'], "Activo") == 0 ? "Inactivar" : "Activar") .
															"</a> ".
														"</td>" . 
													"</tr>";
											echo $fila;
										}
									}
									?>
								</tbody>
							</table>

						  </fieldset>

						  <div class="modal hide fade" id="myModal">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">×</button>
								<h3>Fiicha básica de funcionario</h3>
							</div>
							<div class="modal-body">
								
								<div id="mensaje" class="alert alert-error" style="display:none;">
									<button type="button" class="close" data-dismiss="">×</button>
									<strong style="float:left;">Oh snap!</strong><div style="margin-left:30%;">Change a few things up and try submitting again.</div>
								</div>


								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Nombre del funcionario</label><br  />
										<input class="input-xlarge focused" id="txtNomFun" name="txtNomFun" type="text" style="width:100%;" maxlength="100">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Número de documento</label>
										<input class="input-xlarge focused" id="txtnumDoc" name="txtnumDoc" type="number" style="width:100%;" maxlength="100">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Login de usuario (acceso al sistema)</label><br  />
										<input class="input-xlarge focused" id="txtLogin" name="txtLogin" type="text" style="width:100%;" maxlength="30">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Contraseña (por defecto es el mismo login)</label>
										<input class="input-xlarge focused" id="txtPwd" name="txtPwd" type="text" style="width:100%;" maxlength="100" value="*******************" readonly>
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Dependencia a la que pertenece</label><br  />
										<select data-placeholder="Dependencia del funcionario" id="cmbDependencia" name="cmbDependencia" data-rel="chosen" style="width:100%;" required>
											<optgroup label="Documentos de radicación">
											<option value=""></option>
											<?php
												if($dependencias != null){
												  	foreach($dependencias as $fila)
													{
											?>
													<option value="<?php echo $fila['COD_DEP']; ?>"><?php echo $fila['NOM_DEP']; ?></option>
											<?php
													}
												}
											?>
											</optgroup>
									  </select>
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Rol del sistema</label><br  />
										<select data-placeholder="Rol del funcionario" id="cmbRolFun" name="cmbRolFun" data-rel="chosen" style="width:100%;" required>
											<optgroup label="Documentos de radicación">
											<option value=""></option>
											<?php
												if($roles != null){
												  	foreach($roles as $fila)
													{
											?>
													<option value="<?php echo $fila['COD_ROL']; ?>"><?php echo $fila['NOM_ROL']; ?></option>
											<?php
													}
												}
											?>
											</optgroup>
									  </select>
									</div>
								</div>


								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="text-align:left;float:left;">Típo de funcionario</label>
										<label class="checkbox inline">
											<input type="radio" name="tipoFun" id="rbtPlanta" value="P" checked> Planta
									  	</label>
									  	<label class="checkbox inline">
											<input type="radio" name="tipoFun" id="rbtContratista" value="C"> Contratista
									  	</label>
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="text-align:left;float:left;">¿Jefe dependencia?</label>
										<label class="checkbox inline">
											<input type="radio" name="jefeDep" id="rbtSi" value="S"> Si
									  	</label>
									  	<label class="checkbox inline">
											<input type="radio" name="jefeDep" id="rbtNo" value="N" checked> No
									  	</label>
									</div>
								</div>
							</div>

							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cerrar</a>
								<a id="btnGrabar" href="#" class="btn btn-primary">Grabar</a>
								<a id="btnActualizar" href="#" class="btn btn-primary">Actualizar</a>
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