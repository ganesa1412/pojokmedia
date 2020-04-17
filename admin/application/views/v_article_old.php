<!-- start page -->
<div class="row">
	<div class="col-md-12">

		<?php 
			if (isset($edit_data)) {
				foreach ($edit_data as $edit) {
		 ?>
		<form class="panel" action="<?php echo base_url('crud/edit_article/'.$edit->id_article_old) ?>" method="post" enctype="multipart/form-data">
			<div class="panel-heading bg-warning text-center"><h4 style="margin: 0px;">Edit Data</h4></div>
			<div class="panel-body">
				<table class="table table-striped">
					<tr>
						<td width="20%">Judul:</td>
						<td><?php echo $edit->judul; ?></td>
					</tr>
					<tr>
						<td width="20%">Tanggal:</td>
						<td><?php echo $edit->tanggal; ?></td>
					</tr>
					<tr>
						<td width="20%">Penulis:</td>
						<td><?php echo $edit->nama; ?></td>
					</tr>
					<tr>
						<td width="20%">Keyword:</td>
						<td><?php echo $edit->tags; ?></td>
					</tr>
					<tr>
						<td width="20%">Gambar Utama:</td>
						<td><img src="<?php echo base_url() ?>assets/images/oldimg/<?php echo $edit->id_article_old.".jpg"; ?>" width="100"></td>
					</tr>
					<tr>
						<td width="20%">Caption Gambar Utama:</td>
						<td><?php echo $edit->alt_image; ?></td>
					</tr>
					<tr>
						<td width="20%">Isi Artikel:</td>
						<td><?php echo $edit->isi; ?></td>
					</tr>
				</table>	
			</div>
		</form>
		<br><hr><br>
		<?php 
				} 
			}
		?>
		
		<div class="panel panel-featured-bottom panel-featured-success">
			<div class="panel-body">

				<table class="table table-responsive table-stripped" id="datatable-default">
					<thead>
						<tr>
							<td width="10%">No.</td>
							<td width="7%">Image</td>
							<td width="7%">ID</td>
							<td>Judul</td>
							<td width="14%">Aksi</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 0;
							foreach ($result as $article) {
								$no++;
						 ?>
						<tr>
							<td><?php echo $no ?>.</td>
							<td><img src="<?php echo base_url().'assets/images/oldimg/'.$article->id_article_old.'.jpg' ?>" width="100%"></td>
							<td><?php echo $article->id_article_old ?></td>
							<td><?php echo $article->judul ?></td>
							<td>
								<a href="<?php echo base_url($table.'/view_edit/'.$article->id_article_old) ?>" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Tampilkan"><i class="fa fa-eye"></i></a>
								&nbsp;
								<a href="<?php echo base_url('/crud/delete/'.$table.'/'.$article->id_article_old) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data?')" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- end: page -->