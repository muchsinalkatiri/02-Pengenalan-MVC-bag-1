		<div class="container">
			<!-- Page Heading -->
			<h1 class="my-4">BLOG 
			<small>Artikel</small>
			</h1>
			<div class="row">
				<?php foreach($artikel as $data_row) { ?>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<div class="card h-100">
						<a href="#"><img class="card-img-top" src="<?php echo base_url().'Asset/image/'?><?php echo $data_row['images']; ?>" alt=""></a>
						<div class="card-body">
							<h4 class="card-title">
							<a href="blog/detail/<?php echo $data_row['id_blog'] ?> "><?php echo $data_row['title']; ?></a>
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