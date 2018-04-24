	<?php echo form_open_multipart(base_url('kategori/create')); ?> 
	<div class="container" style="padding-right: 500px; padding-top: 20px; ">
		<div class="modal-content">
			<div class="modal-header">
				<h3><span class="fa fa-plus"></span> Tambah Kategori</h3>
					<a  class="btn" href="#"><span class="fa fa-arrow-left"></span>  Kembali</a>
			</div>
			<div class="modal-body">
			   		<input type="hidden" class="form-control" placeholder="Group ID" name="id_blog">
<!--  -->
					<div class="form-group">
						<label>Nama Kategori</label>
						<input name="kat_name"  type="text" class="form-control" placeholder="Nama kategori...">
					</div>
					<div class="form-group">
						<label>Deskripsi Kategori</label>
						<input name="kat_description"  type="text" class="form-control" placeholder="email penulis...">
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
					</div>
				<!-- </form> -->
			</div>
		</div>
	</div>