	<?php echo form_open_multipart(base_url('index.php/crud/tambah_aksi')); ?> 
	<div class="container" style="padding-right: 500px; padding-top: 20px; ">
		<div class="modal-content">
			<div class="modal-header">
				<h3><span class="fa fa-plus"></span> Tambah artikel</h3>
					<a  class="btn" href="#"><span class="fa fa-arrow-left"></span>  Kembali</a>
			</div>
			<div class="modal-body">
			   		<input type="hidden" class="form-control" placeholder="Group ID" name="id_blog">
					<div class="form-group">
						<label>Judul</label>
						<input name="title" required="required" type="text" class="form-control" placeholder="judul artikel...">
					</div>
					<div class="form-group">
						<label>Isi artikel</label>
						<input name="content_artikel" required="required"  class="form-control" placeholder="Isi artikel...">
					</div>
					<div class="form-group">
						<label>Gambar</label>
						<input name="images" required="required" type="file" class="form-control">
					</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
					</div>
				<!-- </form> -->
			</div>
		</div>
	</div>