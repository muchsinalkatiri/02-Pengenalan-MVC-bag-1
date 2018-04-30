 		<div class="container">
			<!-- Page Heading -->
			<h1 class="my-4"> 
			<small>Kategori</small>
			</h1>
			    <a style=" margin-bottom:20px" href="kategori/create" class="btn btn-info col-md-2 test"><span class="fa fa-plus"> Tambah Kategori</span></a>  
			<div class="row">
				<?php foreach($kategori as $data_row) { ?>
				<div class="col-lg-4 col-sm-6 portfolio-item">
					<input type="hidden" class="form-control" placeholder="Group ID" name="id_kategori">
					<div class="card h-100">
						<div class="card-body">
							<h4 class="card-title">
							<a href="kategori/artikel/<?php echo $data_row->id_kategori; ?> "><?php echo $data_row->kat_name; ?></a>
						</h4>
						<a href="kategori/edit/<?php echo $data_row->id_kategori; ?>"  class="btn btn-primary">
             			 <span class="fa fa-edit"></span>
            			</a>
			            <a href="kategori/hapus/<?php echo $data_row->id_kategori ?> " onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')"  class="btn btn-danger">
			              <span class="fa fa-trash"></span>
			            </a>
							</h4>
							<p class="card-text"><?php echo $data_row->kat_description; ?></p>
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