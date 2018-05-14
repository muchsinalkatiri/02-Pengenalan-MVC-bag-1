<!DOCTYPE html>
<html>
	<head>
		<title>CI3</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'Asset/css/bootstrap.min.css'; ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'Asset/css/bootstrap.css'; ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'Asset/css/kustom.css'; ?>">
		<link href="<?php echo base_url(). 'Asset/font-awesome/css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="<?php echo base_url().'Asset/js/bootstrap.min.js'; ?>"></script>
		<script src="<?php echo base_url() ?>Assets/js/jquery-1.9.1.min.js"></script>
		<script src="<?php echo base_url() ?>Assets/js/bootstrap.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
			<a class="navbar-brand" href="#">MUCHSIN</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo base_url().'welcome'; ?>">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url().'blog'; ?>">Blog</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url().'crud'; ?>">Crud</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url().'kategori'; ?>">Kategori</a>
					</li>
					<form class="form-inline my-2 my-lg-0">
      					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      					<button class="btn btn-outline my-2 my-sm-0" type="submit">Search</button>
    				</form>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<ul class="navbar-nav mr-auto nav nav-pills">
						<li class="nav-item">
							<a class="nav-link active mk-tombol_about" href="<?php echo base_url().'about'; ?>">About</a>
						</li>
					</ul>
				</form>
			</div>
		</nav>