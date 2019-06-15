<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport"
  content="width=device-width, initial-scale=1, user-scalable=yes">
  <link href="<?php echo base_url();?>/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <title>Administración</title>
  <link href="<?php echo base_url();?>/static/css/style.css" rel="stylesheet">
  <script src="<?php echo base_url();?>/static/js/jquery-3.2.1.js"></script>
  <script src="<?php echo base_url();?>/static/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>/static/chart/code/highcharts.js"></script>
  <script src="<?php echo base_url();?>/static/chart/code/modules/exporting.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="#">Bienvenido <?php echo $usuario_logeado; ?></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarColor01">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="<?php echo base_url('productos') ?>">Inicio <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Categorias <span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="categorias">
                <a class="dropdown-item" href="<?php echo base_url('productos') ?>">Productos</a>
                <a class="dropdown-item" href="<?php echo base_url('proveedores') ?>">Proveedores</a>
                <a class="dropdown-item" href="<?php echo base_url('usuarios') ?>">Usuarios</a>
              </div>
            </li>
		    <li class="nav-item">
		    	<a class="nav-link" href="<?php echo base_url('estadisticas') ?>">Estadísticas</a>
		    </li>
	    </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="cuenta" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $usuario_logeado; ?><span class="caret"></span></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="cuenta">
                	<a class="dropdown-item" href="<?php echo base_url('cuenta/cambiarUsuario') ?>" name="cambiar_usuario">Cambiar usuario</a>
                	<a class="dropdown-item" href="<?php echo base_url('cuenta/cambiarClave') ?>" name="cambiar_usuario">Cambiar clave</a>
	                <div class="dropdown-divider"></div>
	                	<a class="dropdown-item" href="<?php echo base_url('ingreso/salir') ?>">Salir</a>
	                </div>
            </li>
        </ul>
	  </div>
	</nav>
	<div class="container-fluid" style="margin-top: 50px">

		<?php if ($this->session->flashdata('success')) { ?>
	        <div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<?= $this->session->flashdata('success') ?>
	        </div>
			<div class="espacio"></div>
	    <?php } ?>

		<?php if ($this->session->flashdata('error')) { ?>
	        <div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<?= $this->session->flashdata('error') ?>
	        </div>
			<div class="espacio"></div>
	    <?php } ?>