<!DOCTYPE html>
<html>
	<head>
		<title>HOME</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'Asset/css/bootstrap.min.css'; ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'Asset/css/kustom.css'; ?>">
		<script type="text/javascript" src="<?php echo base_url().'Asset/js/bootstrap.min.js'; ?>"></script>
	</head>
	<body>
		<div class="container">
			<!-- Page Heading -->
			<h1 class="my-4">BLOG 
			<small>Artikel</small>
			</h1>
			<div class="row">
				<?php foreach($artikel as $data_row) { ?>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="<?php echo $data_row['images']; ?>" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
							<a href="#"><?php echo $data_row['title']; ?></a>
							</h4>
							<p class="card-text"><?php echo substr($data_row['content artikel'], 0, 100) . '...'; ?></p>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<!-- /.row -->
		
		</div>
		<!-- /.container -->
		<!-- Bootstrap core JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	</body>
</html>