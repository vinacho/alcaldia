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
						<a href="#">Asignación de Pqrsf</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Verificación y asignacion de Pqrsf </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action='' method="POST">
														  
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
																"<td class='center'> " .
																	"<a class='btn btn-success' href='#'> ".
																		"<i class='icon-zoom-in icon-white'></i> ".
																		"Asignar ".
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

							<div id="pnlasignacion" style="display:none;">

								<legend>Seleccionar funcionario a asignar</legend>
								<div class="control-group">
									<label class="control-label" for="selectError2">Nro Tick</label>
									<div class="controls">
										<input class="input-xlarge focused" id="txtNumTick" name="txtNumTick" type="text" style="width:70%;" maxlength="20" readonly="readonly">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="selectError2">Funcionario</label>
									<div class="controls">
										<select data-placeholder="Seleccione funcionario a asignar" id="cmbFuncionario" name="cmbFuncionario" data-rel="chosen" style="width:100%;">
											<option value=""></option>
											<optgroup label="Funcionario">
												<option value=""></option>
												<?php
													if($listaFuncionarios != null){
													  	foreach($listaFuncionarios as $fila)
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

								<div class="form-actions">
								  <input type="button" id="btnGuardar" class="btn btn-primary" value="Asignar a funcionario" />
								  <input type="button" class="btn" id="btnCancelar" value="Cancelar" />
								</div>

							</div>
						  </fieldset>



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