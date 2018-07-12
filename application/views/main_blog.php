 		<div class="container">
			<!-- Page Heading -->
			<h1 class="my-4"><?php echo $page_title ?>
			</h1>
			    <a style=" margin-bottom:10px; " href="crud/tambah_aksi" class="btn btn-info col-md-2 test"><span class="fa fa-plus"> Tambah Artikel</span></a>  
			<div class="row">
				<?php foreach($all_artikel as $data_row) { ?>
				<div style="padding-bottom: 20px; " class="col-lg-4 col-sm-6 portfolio-item">
					<input type="hidden" class="form-control" placeholder="Group ID" name="id_blog">
					<div class="card h-100">
						<?php if( $data_row->images ) : ?>
							<a href="blog/detail/<?php echo $data_row->id_blog; ?> "><img class="card-img-top" src="<?php echo base_url().'Asset/image/'?><?php echo $data_row->images; ?>" alt="Card image cap"></a>
						<?php ; else : ?>
							<img class="card-img-top" data-src="holder.js/100px190?theme=thumb&bg=eaeaea&fg=aaa&text=Thumbnail" alt="Card image cap">
						<?php endif; ?>
						<div class="card-body">
							<h4 class="card-title">
							<a href="<?php echo base_url(). 'blog/detail/' . $data_row->id_blog ?>"><?php echo $data_row->title; ?></a>
							<a href="<?php echo base_url(). 'crud/edit_aksi/' . $data_row->id_blog ?>"  class="btn btn-primary">
              <span class="fa fa-edit"></span>
            </a>
							</h4>
							<p class="card-text"><?php echo substr($data_row->content_artikel, 0, 100) . '...'; ?></p>
							.
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<br>
			<br>
						<?php
						 // $links ini berasal dari fungsi pagination
						 // Jika $links ada (data melebihi jumlah max per page), maka tampilkan
						 if (isset($links)) {
						 echo $links;
						 }
						 ?>
			<!-- /.row -->
		
		</div>
		<!-- /.container -->
		<!-- Bootstrap core JavaScript -->

	</body>
</html>