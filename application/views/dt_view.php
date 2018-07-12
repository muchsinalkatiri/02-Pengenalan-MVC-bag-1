
<main role="main">

	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading">Basic DataTables</h1>
			
		</div>
    </section>
  <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <table id="dt-basic" class="table table-striped table-bordered">
					 <tr>
					 <th>ID</th>
					 <th>Tanggal</th>
					 <th>Judul</th>
					 <th>Kategori</th>
					 <th>Status</th>
					 <th>Action</th>
					 </tr>
				 </thead>
				 <tbody>
					 <?php foreach ($data as $d) : ?>
					 <tr>
					 <td><?php echo $d->id_blog ?></td>
					 <td><?php echo $d->tgl_posting ?></td>
					 <td><?php echo $d->title ?></td>
					 <td><?php echo $d->kat_name ?></td>
					 <td><?php echo $d->sumber ?></td>
					 <td><a href="<?php echo base_url('/blog/edit/') . $d->id_blog ?>">Edit</a>
						<a href="<?php echo base_url('/blog/delete/') . $d->id_blog ?>">Delete</a></td>
					 </tr>
					 <?php endforeach; ?>
				 </tbody>
				</table>
            </div>
        </div>
    </section>

<link rel="stylesheet" href="<?php echo base_url() ?>Asset/css/jquery.dataTables.min.css">
<script src="<?php echo base_url() ?>Asset/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>Asset/js/jquery.dataTables.bootstrap4.min.js"></script>
<script>
    jQuery(document).ready(function(){

        // Contoh inisialisasi Datatable tanpa konfigurasi apapun
        // #dt-basic adalah id html dari tabel yang diinisialisasi
        $('#dt-basic').DataTable();
    });

</script>