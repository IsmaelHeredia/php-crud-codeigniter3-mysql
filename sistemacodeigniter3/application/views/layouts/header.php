<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport"
  content="width=device-width, initial-scale=1, user-scalable=yes">
  <link href="<?php echo base_url();?>/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <title>Ingreso</title>
  <link href="<?php echo base_url();?>/static/css/style.css" rel="stylesheet">
  <script src="<?php echo base_url();?>/static/js/jquery-3.2.1.js"></script>
  <script src="<?php echo base_url();?>/static/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">

		<?php if ($this->session->flashdata('success')) { ?>
	        <div class="alert alert-success alert-dismissible" style="margin-top: 50px">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<?= $this->session->flashdata('success') ?>
	        </div>
	    <?php } ?>

		<?php if ($this->session->flashdata('error')) { ?>
	        <div class="alert alert-danger alert-dismissible" style="margin-top: 50px">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<?= $this->session->flashdata('error') ?>
	        </div>
	    <?php } ?>

