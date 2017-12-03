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
						<form class="form-horizontal" action='<?php echo base_url();?>reporteGeneral/Reporte' method="POST">
														  
						  <fieldset>
							<div id="pnlCriteris" style="display:inline;">

								<legend>Filtros de información</legend>

								<div class="control-group">
									<input type="checkbox" name="fechaRadica" id="rbtFechaRadica" style="font-weight: bold;" value="FR"> Fecha de radicación
								</div>

								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="selectError2">Fecha Inicio</label>
										<div class="controls">
											<input class="input-xlarge datepicker" id="txtFecRacIni" name="txtFecRacIni" type="text" style="width:100%;" maxlength="10" value="<?php echo date('Y-m-d') ?>">
										</div>
									</div>	
								</div>
								<div class="span5">
									<div class="control-group">
										<label class="control-label" for="selectError2">Fecha Fin</label>
										<div class="controls">
											<input class="input-xlarge datepicker" id="txtFecRacFin" name="txtFecRacFin" type="text" style="width:100%;" maxlength="10" value="<?php echo date('Y-m-d') ?>">
										</div>
									</div>	
								</div> <br/><br/><br/>

								<div class="control-group">
									<input type="checkbox" name="fechaCieRadica" id="rbtfechaCieRadica" style="font-weight:bold;" value="FC"> Fecha de cierre de la radicación
								</div>

								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="selectError2">Fecha Inicio</label>
										<div class="controls">
											<input class="input-xlarge datepicker" id="txtFecCieIni" name="txtFecCieIni" type="text" style="width:100%;" maxlength="10" value="<?php echo date('Y-m-d') ?>">
										</div>
									</div>	
								</div>
								<div class="span5">
									<div class="control-group">
										<label class="control-label" for="selectError2">Fecha Fin</label>
										<div class="controls">
											<input class="input-xlarge datepicker" id="txtFecCieFin" name="txtFecCieFin" type="text" style="width:100%;" maxlength="10" value="<?php echo date('Y-m-d') ?>">
										</div>
									</div>	
								</div>

								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="selectError2">Cantidad de folios</label>
										<div class="controls">
											<input class="input-xlarge focused" placeholder="Cantidad de folios" id="txtCantFolios" name="txtCantFolios" type="number" style="width:100%;" maxlength="10">
										</div>
									</div>	
								</div>
								<div class="span5">
									<div class="control-group">
										<label class="control-label" for="selectError2">Numero de oficio</label>
										<div class="controls">
											<input class="input-xlarge focused" id="txtNumOfi" placeholder="Numero de oficio" name="txtNumOfi" type="text" style="width:100%;" maxlength="10">
										</div>
									</div>	
								</div>

								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="selectError2">Clase de documento</label>
										<div class="controls">
											<select data-placeholder="Seleccione la clase de documento" id="cmbClaDoc" name="cmbClaDoc" data-rel="chosen" style="width:100%;">
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
								</div>

								<div class="span5">
									<div class="control-group">
										<label class="control-label" for="selectError2">Funcionario que registro</label>
										<div class="controls">
											<select data-placeholder="Seleccione el funcionario que registro" id="cmbFuncionario" name="cmbFuncionario" data-rel="chosen" style="width:100%;">
												<option value=""></option>
												<?php
												if($listaFun != null){
													foreach($listaFun as $fila)
													{
												?>
														<option value="<?php echo $fila['COD_FUN']; ?>"><?php echo $fila['NOM_FUN']; ?></option>
												<?php
													}
												}
												?>
											</select>
										</div>
									</div>
								</div>
								<div style="clear:both;">&nbsp;</div>
								
								<div class="form-actions">
								  <input type="submit" id="btnGuardar" class="btn btn-primary" value="Generar reporte" />
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