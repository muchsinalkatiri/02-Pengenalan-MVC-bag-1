  <div class="container" style="padding-right: 100px; text-align: justify; padding-top: 20px;">
    <h3>
      <span class="fa fa-info-circle"></span> 
        Detail Artikel  
    </h3>
    <a class="btn" href="#"><span class="fa fa-arrow-left"></span>  Kembali</a>
      
      <table class="table">
        <tr>
          <td>ID</td>
          <td><?php echo $data['id_blog'] ?></td>
        </tr>
        <tr>
          <td>Penulis</td>
          <td><?php echo $data['author'] ?></td>
        </tr>
        <tr>
          <td>Email Author</td>
          <td><?php echo $data['email_author'] ?></td>
        </tr>
        <tr>
          <td>Judul</td>
          <td><?php echo $data['title'] ?></td>
        </tr>
        <tr>
          <td>Kategori</td>
          <td><?php echo $data['kategori'] ?></td>
        </tr>
        <tr>
          <td>Conten Artikel</td>
          <td><?php echo $data['content_artikel'] ?></td>
        </tr>    
        <tr>
          <td>Gambar</td>
          <td><img style='width:100px;height:150px' src="<?php echo base_url().'Asset/image/'?><?php echo $data['images']; ?>"></td>
        </tr>
        <tr> 
        <tr>
          <td>Tanggal Posting</td>
          <td><?php echo $data['tgl_posting'] ?></td>
        </tr>    
      </table>
    </div>