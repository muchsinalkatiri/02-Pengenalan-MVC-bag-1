	<?php echo form_open_multipart(base_url('index.php/crud/edit_aksi')); ?> 
	<div class="container" style="padding-right: 500px; padding-top: 20px; ">
		<div class="modal-content">
			<div class="modal-header">
				<h3><span class="fa fa-edit"></span> Edit artikel</h3>
					<a  class="btn" href="#"><span class="fa fa-arrow-left"></span>  Kembali</a>
			</div>
			<div class="modal-body">
			   		<input type="hidden" class="form-control" placeholder="Group ID" name="id_blog" value="<?php echo $data['id_blog']; ?>">
					<div class="form-group">
						<label>Judul</label>
						<input name="title" required="required" type="text" class="form-control" value="<?php echo $data['title']; ?>">
					</div>
					<div class="form-group">
						<label>Isi artikel</label>
						<input name="content_artikel" required="required"  class="form-control" value="<?php echo $data['content_artikel']; ?>">
					</div>
					<div class="form-group">
						<label>Gambar</label>
						<input name="images" required="required" type="file" class="form-control" >
					</div>
					<div class="form-group">
						<td>Tanggal Posting  &nbsp :  &nbsp </td>
          				<td><?php echo $data['tgl_posting'] ?></td>
					</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
					</div>
				<!-- </form> -->
			</div>
		</div>
	</div>