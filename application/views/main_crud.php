<div class="container">
    <div class="col-md-12">
    <h3><span class="fa fa-plus"></span>  Data Artikel</h3>          
    <a style="margin-bottom:20px" href="#" class="btn btn-info col-md-2 test"><span class="fa fa-plus"> Tambah Artikel</span></a>    
    <br/>
    <br/>
   </div> 

    <table class="table table-hover" >
      <tr align="center">
        <th class="col-md-0">No</th>
        <th class="col-md-0">ID</th>
        <th class="col-md-0">Title</th>
        <th class="col-md-0">Conten</th>
        <th class="col-md-0">Gambar</th>
        <th class="col-md-0">Tanggal Posting</th>
        <th class="col-md-0">Opsi</th>
      </tr>
      <?php 
        $no=1;
        $num_char = 20;
        foreach($artikel as $b){
      ?>
        <tr align="center">
          <td><?php echo $no++ ?></td>
          <td><?php echo $b['id_blog'] ?></td>
          <td><?php echo $b['title'] ?></td>
          <td><?php echo substr($b['content artikel'], 0, $num_char) . '...'; ?></td>
          <td><img style='width:100px;height:150px' src="<?php echo base_url().'Asset/image/'?><?php echo $b['images']; ?>"></td>
          <td><?php echo $b['tgl posting'] ?></td>
          <td>
            <a  href="#" class="btn btn-success">
              <span class="fa fa-info-circle">  Detail</span>
            </a>
            <a href="#" class="btn btn-primary">
              <span class="fa fa-edit">  Edit</span>
            </a>
            <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='#' }" class="btn btn-danger">
              <span class="fa fa-trash">  Hapus</span>
            </a>
          </td>
        </tr>   
        <?php 
      }
      ?>
    </table>
  </div>
	</body>
</html>