	<div class="container">
		<div style="clear:both;">&nbsp;</div>
		<div style="clear:both;">&nbsp;</div>
		<div style="clear:both;">&nbsp;</div>
		<div style="clear:both;">&nbsp;</div>
		<div style="clear:both;">&nbsp;</div>
	    <div class="row">

	    	<div class="col-md-4 col-md-offset-4">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Inicio de sesión radicaweb</h3>
				 	</div>
				  	<div class="panel-body">

    					<form id="form1" action="<?php echo base_url(); ?>login/IniciarSesion" method="POST">
		                    <fieldset>
					    	  	<div class="form-group">
					    		    <input class="form-control" placeholder="Login de usuario" name="txtuser" id="txtuser" type="text">
					    		</div>
					    		<div class="form-group">
					    			<input class="form-control" placeholder="Contraseña" name="txtpwd" id="txtpwd" type="password" value="">
					    		</div>
					    		<div class="checkbox">
					    	    	<label>
					    	    		<input name="remember" type="checkbox" value="Remember Me"> Recordarme
					    	    	</label>
					    	    </div>
					    		<input class="btn btn-lg btn-success btn-block" id="btnIniciarSesion" type="button" value="Login">
					    	</fieldset>
						</form>			      	
	                    
				    </div>
				</div>
			</div>
		</div>
	</div>