<!-- start page -->
<div class="row">
	<div class="col-md-6">

		<form class="panel" action="<?php echo base_url('crud/settings/profile/'.$profile_id) ?>" method="post" enctype="multipart/form-data">
			<div class="panel-heading bg-warning text-center"><h4 style="margin: 0px;">Sunting Profil</h4></div>
			<div class="panel-body">
					<label>Foto Profil:</label>
					<div class="alert alert-default" style="width: 50%;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<img src="<?php echo base_url("assets/images/admin/".$profile_id.".jpg") ?>" width="80%">
					</div>
					<input type="file" class="form-control" name="image">
					<br>

					<label>Username:</label>
					<input type="text" class="form-control" name="username" placeholder="" required="" value="<?php echo $profile_username ?>">
					<br>
					
					<label>Nama Lengkap:</label>
					<input type="text" class="form-control" name="full_name" placeholder="" required="" value="<?php echo $profile_name ?>">
					<br>

					<label>Bio:</label>
					<textarea class="form-control" name="about"><?php echo $profile_about ?></textarea>
					<br>	
			</div>
			<div class="panel-footer text-right">
				<input class="btn btn-warning" value="Simpan" type="submit">
			</div>
		</form>
		<br><hr><br>

	</div>
	<div class="col-md-6">

		<form class="panel" action="<?php echo base_url('crud/settings/password/'.$profile_id) ?>" method="post" enctype="multipart/form-data">
			<div class="panel-heading bg-warning text-center"><h4 style="margin: 0px;">Ubah Password</h4></div>
			<div class="panel-body">

					<label>Old Password:</label>
					<input type="password" class="form-control" name="old_password" placeholder="" required="">
					<br>
					
					<label>New Password:</label>
					<input type="password" class="form-control" name="password1" placeholder="" required="">
					<br>
					
					<label>Retype New Password:</label>
					<input type="password" class="form-control" name="password2" placeholder="" required="">
					<br>
			</div>
			<div class="panel-footer text-right">
				<input class="btn btn-warning" value="Simpan" type="submit">
			</div>
		</form>
		<br><hr><br>

	</div>

</div>
<!-- end: page -->