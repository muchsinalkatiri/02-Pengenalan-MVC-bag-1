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
						<label>Author</label>
						<input name="author" required="required" type="text" class="form-control" value="<?php echo $data['author']; ?>">
					</div>
					<div class="form-group">
						<label>Email Author</label>
						<input name="email_author" required="required" type="Email" class="form-control" value="<?php echo $data['email_author']; ?>">
					</div>
					<div class="form-group">
						<label>Judul</label>
						<input  name="title" required="required" type="text" class="form-control" value="<?php echo $data['title']; ?>">
					</div>
					<div class="form-group">
						<label>Kategori</label>	
						<br>
						<select name="kategori" class="form-control" value="<?php echo $data['kategori']; ?>">
			            	<option value="film">Film</option>
			            	<option value="series">Series</option>
			            	<option value="game">Game</option>
						</select>
					</div>
					<div class="form-group">
					    <label for="exampleFormControlTextarea1">Content Artikel</label>
					    <textarea class="form-control" name="content_artikel" id="exampleFormControlTextarea1" rows="5" ><?php echo $data['content_artikel']; ?></textarea>
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