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
						<a href="#">Impresión PQRSF de entrada </a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-edit"></i> Impresión PQRSF entrada </h2>
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
											<th>No radicado</th>
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
													if ($fila['IMP']==1) {
														$ro="<tr style='color:green'>";	
													} else {
														$ro = "<tr>" ;
													}
											        		
													$fila = $ro .
																"<td class='center'>" . $fila['FEC_RAC_PQR'] . "</td>" .
																"<td class='center'>" . $fila['NUM_PQR'] . "</td>" .
																"<td class='center'>" . $fila['NUM_TIC_PQR'] . "</td>" .
																"<td class='center'>" . $fila['NOM_DOC'] . "</td>" .
																"<td class='center'>" . $fila['ASU_PQR'] . "</td>" .
																"<td class='center'>" . $fila['NOM_PER'] . "</td>" .
																"<td class='center'>" . $fila['NUM_DOC_PER'] . "</td>" .
																"<td class='center'> " .
																	"<a class='btn btn-info' href='#'> ".
																		"<i class='icon-print icon-white'></i> ".
																		"Imprimir ".
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

							<div id="pnlImpresion" style="display:none;"></div>
							
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

	<div class="container-fluid">
		
		<hr>
		<footer>
			<p class="pull-right">Copyrigth <?php echo date('Y'); ?> - RadicaWeb</p>
		</footer>
	</div><!--/.fluid-container-->