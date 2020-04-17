<!-- start page -->
<div class="row">
	<div class="col-md-12">

		<?php 
			if (isset($edit_data)) {
				foreach ($edit_data as $edit) {
		 ?>
		<form class="panel" action="<?php echo base_url('crud/edit/'.$table.'/'.$edit->id_user) ?>" method="post" enctype="multipart/form-data">
			<div class="panel-heading bg-warning text-center"><h4 style="margin: 0px;">Edit Data</h4></div>
			<div class="panel-body">
				<label>Nama:</label>
				<input type="text" class="form-control" name="full_name" placeholder="Nama" required="" value="<?php echo $edit->full_name ?>">
				<br>

				<label>Username:</label>
				<input type="text" class="form-control" name="username" placeholder="Username" required="" value="<?php echo $edit->username ?>">
				<br>
				
				<input type="hidden" name="password" value="<?php echo $edit->password ?>">

				<label>Bio:</label>
				<textarea class="form-control" name="about"><?php echo $edit->about ?></textarea>
				<br>

				<label>Level:</label>
				<select class="form-control" name="admin">
					<option value="1" <?php echo ($edit->admin == 1?'selected':'') ?>>Admin</option>
					<option value="0" <?php echo ($edit->admin == 0?'selected':'') ?>>Writer</option>
				</select>
			</div>
			<div class="panel-footer text-right">
				<input class="btn btn-warning" value="Simpan" type="submit">
				&nbsp;
				<a href="<?php echo base_url('user') ?>" class="btn btn-default">Batal</a>
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
							<td>Nama user</td>
							<td>Username</td>
							<td>Bio</td>
							<td>Level</td>
							<td width="20%">Aksi</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 0;
							foreach ($result as $user) {
								$no++;
						 ?>
						<tr>
							<td><?php echo $no ?>.</td>
							<td><?php echo $user->full_name ?></td>
							<td><?php echo $user->username ?></td>
							<td><?php echo $user->about ?></td>
							<td><?php echo ($user->admin==1?'Admin':'Writer') ?></td>
							<td>
								<a href="<?php echo base_url($table.'/view_edit/'.$user->id_user) ?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-edit"></i></a>
								&nbsp;
								<a href="<?php echo base_url('/crud/delete/'.$table.'/'.$user->id_user) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data?')" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
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
      	
      	<label>Nama:</label>
		<input type="text" class="form-control" name="full_name" placeholder="Nama" required="">
		<br>

		<label>Username:</label>
		<input type="text" class="form-control" name="username" placeholder="Username" required="">
		<br>

		<label>Password:</label>
		<input type="password" class="form-control" name="password" placeholder="Password" required="">
		<br>

		<label>Bio:</label>
		<textarea class="form-control" name="about"></textarea>
		<br>

		<label>Level:</label>
		<select class="form-control" name="admin">
			<option value="1">Admin</option>
			<option value="0">Writer</option>
		</select>
      </div>
      <div class="modal-footer text-right">
      	<input type="submit" class="btn btn-primary" value="Tambah">
      </div>
      </div>
    </div>
</form>
<!-- MODAL END -->