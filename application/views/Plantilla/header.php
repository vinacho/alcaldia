<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<meta name="viewport" content="">
	<meta name="description" content="">

	<title><?= $titulo; ?></title>
	
	<?php 
      //Configurar BaseURL
      $baseSitio = base_url();
    ?>

	<!-- The styles -->
	<link href="<?php echo $baseSitio; ?>assets/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="<?php echo $baseSitio; ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?php echo $baseSitio; ?>assets/css/charisma-app.css" rel="stylesheet">
	<link href="<?php echo $baseSitio; ?>assets/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='<?php echo $baseSitio; ?>assets/css/fullcalendar.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='<?php echo $baseSitio; ?>assets/css/chosen.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/uniform.default.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/colorbox.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/jquery.noty.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/noty_theme_default.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/elfinder.min.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/elfinder.theme.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/opa-icons.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/uploadify.css' rel='stylesheet'>
	
	<link href='<?php echo $baseSitio; ?>assets/css/pnotify.brighttheme.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/pnotify.buttons.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/pnotify.history.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/pnotify.material.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/pnotify.mobile.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/pnotify.nonblock.css' rel='stylesheet'>
	<link href='<?php echo $baseSitio; ?>assets/css/pnotify.css' media="all" rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="<?php echo $baseSitio; ?>assets/img/favicon.ico">

	<?php if(isset($css)) echo $css; ?>
	
</head>

<body <?php if(isset($load_java)) echo $load_java; ?>>

	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a href="#" style="width:25%;"> <img alt="Logo" src="<?php echo base_url();?>assets/img/logotipo-320-2.png" width="320px" /></a>
				<!--class="brand" <span>Personería Ibagué</span>-->
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<?php
					if ($this->session->userdata('COD_FUN') == null) {
						echo "<a class='btn dropdown-toggle' href='" . base_url() . "login'>".
								"<i class='icon-home'></i><span class='hidden-phone'> Iniciar sesión</span>".
							 "</a>";
					}
					else{
						echo "<a class='btn dropdown-toggle' data-toggle='dropdown' href='#''> " .
									"<i class='icon-user'></i><span class='hidden-phone'>" . $this->session->userdata('NOM_FUN') . "</span> " .
									"<span class='caret'></span> " .
								"</a>".
								"<ul class='dropdown-menu'>".
									"<li><a href='" . base_url() . "cerrarSesion'>Cerrar Sesi&oacute;n</a></li>" .
								"</ul>";
					}
					?>
				</div>
				<!-- user dropdown ends -->
				
				<!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- topbar ends -->
