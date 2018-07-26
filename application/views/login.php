<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<br><br><br><br><br><br>
<?php echo form_open('user/login'); ?>
	<div class="container">
	<div class="col-lg-8 offset-lg-4">
	<div class="row">
		<div class="col-md-6 col-md-offset-2">
			<h1 class="text-center"><?php echo $page_title; ?></h1>
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="Masukkan Username" required autofocus>
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
		</div>
	</div>
	</div>
	</div>
<?php echo form_close(); ?>
<br><br><br><br><br><br><br>

<!-- Begin page content -->

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

	<script src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>

    <!-- Custom -->
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>