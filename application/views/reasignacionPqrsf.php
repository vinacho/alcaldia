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
						<a href="#">Reasignación de Pqrsf</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Reasignacion de radicados Pqrsf </h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action='' method="POST">
														  
						  <fieldset>

						  	<div id="pnlReasignacion">

								<table class="table table-striped table-bordered bootstrap-datatable datatable">
									<thead>
										<tr>
											<th>Fecha</th>
											<th>No. radicado</th>
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
																"<td class='center'>" . $fila['NUM_PQR'] . "</td>" .
																"<td class='center'>" . $fila['NUM_TIC_PQR'] . "</td>" .
																"<td class='center'>" . $fila['NOM_DOC'] . "</td>" .
																"<td class='center'>" . $fila['ASU_PQR'] . "</td>" .
																"<td class='center'>" . $fila['NOM_PER'] . "</td>" .
																"<td class='center'>" . $fila['NUM_DOC_PER'] . "</td>" .
																"<td class='center'> " .
																	"<a class='btn btn-info' href='#'> ".
																		"<i class='icon-wrench icon-white'></i> ".
																		"Reasignar ".
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

								<legend>Modificacióon de datos de radicado</legend>
								<div class="control-group">
									<label class="control-label" for="selectError2">Nro Tick</label>
									<div class="controls">
										<input class="input-xlarge focused" id="txtNumTick" name="txtNumTick" type="text" style="width:70%;" maxlength="20" readonly="readonly">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="selectError2">Clase de documento</label>
									<div class="controls">
										<select data-placeholder="Seleccione la dependencia a reasignar" id="cmbClaDoc" name="cmbClaDoc" data-rel="chosen" style="width:100%;">
											<option value=""></option>
											<?php 
											if($documentos != null){													
											  	foreach($documentos as $fila)
												{
											?>
													<option value="<?php echo $fila['COD_DOC']; ?>"><?php echo $fila['NOM_DOC']; ?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="selectError2">Dependencia</label>
									<div class="controls">
										<input type="hidden" id="idfun" name="idfun">
										<input type="hidden" id="rolfun" name="rolfun">
										<select data-placeholder="Seleccione la dependencia a reasignar" id="cmbDependencia" name="cmbDependencia" data-rel="chosen" style="width:100%;">
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
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="selectError2">Funcionario</label>
									<div class="controls">
										<select  id="cmbFuncionario" name="cmbFuncionario" style="width:71%;">
											<option value=""></option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="selectError2">No. Oficio</label>
									<div class="controls">
										<input class="input-xlarge focused" id="txtOficio" name="txtOficio" type="text" style="width:70%;" maxlength="30">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="selectError2">Asunto</label>
									<div class="controls">
										<input class="input-xlarge focused" id="txtAsunto" name="txtAsunto" type="text" style="width:70%;" maxlength="200">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="selectError2">Observaciones</label>
									<div class="controls">
										<textarea  id="txtObservacion" name="txtObservacion" maxlength="300" rows="4" style="width:70%;"></textarea>
									</div>
								</div>

								<div class="form-actions">
								  <input type="button" id="btnGuardar" class="btn btn-primary" value="Reasignar caso" />
								  <input type="button" class="btnCancelar" id="btnCancelar" value="Cancelar" />
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