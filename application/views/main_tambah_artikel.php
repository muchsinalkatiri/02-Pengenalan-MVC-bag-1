	<?php echo form_open_multipart(base_url('crud/tambah_aksi')); ?> 
	<div class="container" style="padding-right: 500px; padding-top: 20px; ">
		<div class="modal-content">
			<div class="modal-header">
				<h3><span class="fa fa-plus"></span> Tambah artikel</h3>
					<a  class="btn" href="#"><span class="fa fa-arrow-left"></span>  Kembali</a>
			</div>
			<div class="modal-body">
			   		<input type="hidden" class="form-control" placeholder="Group ID" name="id_blog">
			   		<?php    
						$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
					?>
					<?php echo validation_errors(); ?>

					<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>

					<?php echo form_open_multipart( 'crud/tambah_aksi', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
					<div class="form-group">
						<label>Penulis</label>
						<input name="author"  type="text" class="form-control" placeholder="penulis...">
					</div>
					<div class="form-group">
						<label>Email Penulis</label>
						<input name="email_author"  type="Email" class="form-control" placeholder="email penulis...">
					</div>
					<div class="form-group">
						<label>Judul</label>
						<input name="title"  type="text" class="form-control" placeholder="judul artikel...">
					</div>
					<div class="form-group">
						<label>Sumber</label>
						<input name="sumber"  type="text" class="form-control" placeholder="Sumber...">
					</div>
					<div class="form-group">
					    <label for="exampleFormControlTextarea1">Content Artikel</label>
					    <textarea class="form-control" name="content_artikel" id="exampleFormControlTextarea1" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label>Kategori</label>
						<?php echo form_dropdown('id_kategori', $kategori, set_value('id_kategori'), 'class="form-control" required' ); ?>
						<div class="invalid-feedback">Pilih dulu kategorinya gan</div>
					</div>
					<div class="form-group">
						<label>Gambar</label>
						<input name="images"  type="file" class="form-control">
					</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
					</div>
				<!-- </form> -->
			</div>
		</div>
	</div>