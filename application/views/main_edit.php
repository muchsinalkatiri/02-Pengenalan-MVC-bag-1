	<?php echo form_open_multipart(base_url('crud/edit_aksi/$data_row->id_blog')); ?> 
	<div class="container" style="padding-right: 500px; padding-top: 20px; ">
		<div class="modal-content">
			<div class="modal-header">
				<h3><span class="fa fa-edit"></span> Edit artikel</h3>
					<a  class="btn" href="#"><span class="fa fa-arrow-left"></span>  Kembali</a>
			</div>
			<div class="modal-body">
			   		<input type="hidden" class="form-control" placeholder="Group ID" name="id_blog" value="<?php echo $data['id_blog']; ?>">
						<div class="form-group">
						<label>Author</label>
						<input name="author"  type="text" class="form-control" value="<?php echo $data['author']; ?>">
					</div>
					<?php    
						$this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');
					?>
					<?php echo validation_errors(); ?>

					<?php echo (isset( $upload_error)) ? '<div class="alert alert-warning" role="alert">' .$upload_error. '</div>' : ''; ?>

					<?php echo form_open_multipart( 'crud/edit_aksi', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
					<div class="form-group">
						<label>Email Author</label>
						<input name="email_author"  type="Email" class="form-control" value="<?php echo $data['email_author']; ?>">
					</div>
					<div class="form-group">
						<label>Judul</label>
						<input  name="title"  type="text" class="form-control" value="<?php echo $data['title']; ?>">
					</div>
					<div class="form-group">
						<label>Sumber</label>
						<input  name="sumber"  type="text" class="form-control" value="<?php echo $data['sumber']; ?>">
					</div>
					<div class="form-group">
					    <label for="exampleFormControlTextarea1">Content Artikel</label>
					    <textarea class="form-control" name="content_artikel" id="exampleFormControlTextarea1" rows="5" ><?php echo $data['content_artikel']; ?></textarea>
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