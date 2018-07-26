<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Begin page content -->
<main role="main" class="container">
			
	<section>
		<div class="container">
		<center>
		<h1 class="jumbotron-heading"><?php	echo $page_title ?></h1>
		</center>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">

						<label>Nama Lengkap</label>
						<input type="text" class="form-control" name="nama" value="<?php echo set_value('nama') ?>" placeholder="Nama Lengkap">
					</div>
					<div class="form-group">
						<label>Kodepos</label>
						<input type="text" class="form-control" name="kodepos" value="<?php echo set_value('kodepos') ?>" placeholder="Kodepos">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" value="<?php echo set_value('email') ?>" placeholder="Email">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="username" value="<?php echo set_value('username') ?>" placeholder="Username">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat') ?>" placeholder="Alamat">
					</div>
					<div class="form-group">
						<label>No HP</label>
						<input type="text" class="form-control" name="nohp" value="<?php echo set_value('nohp') ?>" placeholder="No Hp">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" value="<?php echo set_value('password') ?>" placeholder="Password">
					</div>
					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input type="password" class="form-control" name="password2" value="<?php echo set_value('password2') ?>" placeholder="Ulangi Password">
					</div>
					<div class="form-group">
					    <label for="">Pilih Paket Membership</label>
					    <div class="form-check">
					        <input class="form-check-input" type="radio" name="membership" id="goldmember" value="3" checked>
					        <label class="form-check-label" for="goldmember">Member Silver</label>
					    </div>
					    <div class="form-check">
					        <input class="form-check-input" type="radio" name="membership" id="silvermember" value="2">
					        <label class="form-check-label" for="silvermember">Member Premium</label>
					    </div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</section>
</main>
<br><br>


    <!-- Plugins -->
    <script src="<?php echo base_url() ?>assets/js/holder.min.js"></script>

    <!-- Custom -->
    <script src="<?php echo base_url() ?>assets/js/custom.js"></script>