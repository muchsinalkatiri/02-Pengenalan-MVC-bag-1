	<?php echo form_open_multipart(base_url('crud/tambah_aksi')); ?> 
	<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<?php echo validation_errors(); ?>
	<div class="container" style="padding-right: 500px; padding-top: 20px; ">
		<div class="modal-content">
			<div class="modal-header">
				<h3><span class="fa fa-plus"></span> Tambah artikel</h3>
					<a  class="btn" href="#"><span class="fa fa-arrow-left"></span>  Kembali</a>
			</div>
			<div class="modal-body">
			   		<input type="hidden" class="form-control" placeholder="Group ID" name="id_blog">
					<div class="form-group">
						<label>Author</label>
						<input name="author"  type="text" class="form-control" placeholder="penulis...">
					</div>
					<div class="form-group">
						<label>Email Author</label>
						<input name="email_author"  type="Email" class="form-control" placeholder="email penulis...">
					</div>
					<div class="form-group">
						<label>Judul</label>
						<input name="title"  type="text" class="form-control" placeholder="judul artikel...">
						<?php echo form_error('title'); ?>
					</div>
					<div class="form-group">
						<label>Kategori</label>	
						<br>
						<select name="kategori" class="form-control">
			            	<option value="film">Film</option>
			            	<option value="series">Series</option>
			            	<option value="game">Game</option>
						</select>
					</div>
					<div class="form-group">
					    <label for="exampleFormControlTextarea1">Content Artikel</label>
					    <textarea class="form-control" name="content_artikel" id="exampleFormControlTextarea1" rows="3"></textarea>
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