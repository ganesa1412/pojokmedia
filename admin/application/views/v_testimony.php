<!-- start page -->
<div class="row">
	<div class="col-md-12">

		<?php 
			if (isset($edit_data)) {
				foreach ($edit_data as $edit) {
		 ?>
		<form class="panel" action="<?php echo base_url('crud/edit/'.$table.'/'.$edit->id_testimony) ?>" method="post" enctype="multipart/form-data">
			<div class="panel-heading bg-warning text-center"><h4 style="margin: 0px;">Edit Data</h4></div>
			<div class="panel-body">
					<label>Nama Customer:</label>
					<input type="text" class="form-control" name="name" placeholder="Nama Customer" required="" value="<?php echo $edit->name ?>">
					<br>

					<label>Foto:</label>
					<div class="alert alert-default" style="width: 40%;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<img src="<?php echo $main_site.'assets/images/testimony/'.$edit->image ?>" width="80%">
					</div>
					<input type="file" class="form-control" name="image">
					<br>

					<label>Isi Testimoni:</label>
					<textarea class="form-control" name="testimony" placeholder="Isi Testimoni"><?php echo $edit->testimony ?></textarea>	
			</div>
			<div class="panel-footer text-right">
				<input class="btn btn-warning" value="Simpan" type="submit">
				&nbsp;
				<a href="<?php echo base_url('testimony') ?>" class="btn btn-default">Batal</a>
			</div>
		</form>
		<br><hr><br>
		<?php 
				} 
			}
		?>
		
		<div class="panel panel-featured-bottom panel-featured-success">
			<div class="panel-heading text-right">
				<button data-toggle="modal" data-target="#tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
			</div>
			<div class="panel-body">
				<table class="table table-responsive table-stripped" id="datatable-default">
					<thead>
						<tr>
							<td width="10%">No.</td>
							<td width="15%">Foto</td>
							<td width="20%">Nama Customer</td>
							<td>Testimoni</td>
							<td width="20%">Aksi</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 0;
							foreach ($result as $testimony) {
								$no++;
						 ?>
						<tr>
							<td><?php echo $no ?>.</td>
							<td><img src="<?php echo $main_site.'assets/images/testimony/'.$testimony->image ?>" width="100%"></td>
							<td><?php echo $testimony->name ?></td>
							<td><?php echo $testimony->testimony ?></td>
							<td>
								<a href="<?php echo base_url($table.'/view_edit/'.$testimony->id_testimony) ?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-edit"></i></a>
								&nbsp;
								<a href="<?php echo base_url('/crud/delete/'.$table.'/'.$testimony->id_testimony) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data?')" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
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

<!-- MODAL -->
<form class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="helpModal" aria-hidden="true" method="post" action="<?php echo base_url('crud/add/'.$table) ?>" enctype="multipart/form-data">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-help bg-primary">
        <button type="button" class="close" style="color:#FFF;opacity:1.0;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
        <h3 class="modal-title text-center" id="myModalLabel">Tambah Data:</h3>
      </div>
      <div class="modal-body">
      	
      	<label>Nama Customer:</label>
		<input type="text" class="form-control" name="name" placeholder="Nama Customer" required="">
		<br>

		<label>Foto:</label>
		<input type="file" class="form-control" name="image">
		<br>

		<label>Isi Testimoni:</label>
		<textarea class="form-control" name="testimony" placeholder="Isi Testimoni"></textarea>	
      </div>
      <div class="modal-footer text-right">
      	<input type="submit" class="btn btn-primary" value="Tambah">
      </div>
      </div>
    </div>
</form>
<!-- MODAL END -->