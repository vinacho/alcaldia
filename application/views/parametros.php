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
						<a href="#">Creación - actualización de parámetros</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Parámetros del sistema </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action='' method="POST">
						  <fieldset>

						  	<a href="#" id="btnAgregarDoc" class="btn btn-success" data-toggle='modal' data-target='#myModal'><i class="icon-plus icon-white"></i> Nuevo parámetro</a>
						  	<div style="clear:both;">&nbsp;</boht>

							<table class="table table-striped table-bordered bootstrap-datatable datatable">
								<thead>
									<tr>
										<th>Código</th>
										<th>Nombre</th>
										<th>Valor</th>
										<th>Opciones</th>
									</tr>
								</thead>   							
								<tbody>
									
										<?php
										foreach($parametros as $fila){
											$fila = "<tr>" .
														"<td class='center'>" . $fila['COD_PAR'] . "</td>" .
														"<td class='center'>" . $fila['NOM_PAR'] . "</td>" .
														"<td class='center'>" . $fila['VAL_PAR'] . "</td>" .
														"<td class='center'> " .
															"<a class='btn btn-info' href='#' data-toggle='modal' data-target='#myModal'> ".
																"<i class='icon-edit icon-white'></i> ".
																"Editar ".
															"</a> ".
															"<a class='btn btn-success' href='#' data-toggle='modal' data-target='#myModal'> ".
																"<i class='icon-zoom-in icon-white'></i> ".
																"Visualizar ".
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
								<h3>Creación - actualización de parámetros</h3>
							</div>
							<div class="modal-body">
								
								<div id="mensaje" class="alert alert-error" style="display:none;">
									<button type="button" class="close" data-dismiss="">×</button>
									<strong style="float:left;">Oh snap!</strong><div style="margin-left:30%;">Change a few things up and try submitting again.</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Código documento</label><br  />
										<input class="input-xlarge focused" id="txtCodPar" name="txtCodPar" type="text" style="width:100%;" maxlength="10">
									</div>
								</div>

								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Nombre documento</label>
										<input class="input-xlarge focused" id="txtNomPar" name="txtNomPar" type="text" style="width:100%;" maxlength="100">
									</div>
								</div>
								
								<div class="span11">
					            	<div class="control-group" style="margin-top: -2%;">
										<label class="control-label" for="focusedInput" style="width:100%;text-align:left;">Valor del parametro</label>
										<textarea class="input-xlarge focused" id="txtValPar" name="txtValPar" style="width:100%;" maxlength="50" rows="4"></textarea>
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