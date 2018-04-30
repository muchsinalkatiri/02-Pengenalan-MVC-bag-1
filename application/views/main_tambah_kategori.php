	<?php echo form_open_multipart(base_url('kategori/create')); ?> 
	<div class="container" style="padding-right: 500px; padding-top: 20px; ">
		<div class="modal-content">
			<div class="modal-header">
				<h3><span class="fa fa-plus"></span> Tambah artikel</h3>
					<a  class="btn" href="#"><span class="fa fa-arrow-left"></span>  Kembali</a>
			</div>
			<div class="modal-body">
			   		<input type="hidden" class="form-control" placeholder="Group ID" name="id_kategori">
			   		<?php    
						$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
					?>
					<?php echo validation_errors(); ?>

					<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>

					<?php echo form_open_multipart( 'kategori/create', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
					<div class="form-group">
						<label>Nama Kategori</label>
						<input name="kat_name"  type="text" class="form-control" placeholder="nama kategori..">
					</div>
					<div class="form-group">
					    <label for="exampleFormControlTextarea1">Deskripsi Kategori</label>
					    <textarea class="form-control" name="kat_description" id="exampleFormControlTextarea1" rows="3"></textarea>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
					</div>
				<!-- </form> -->
			</div>
		</div>
	</div>