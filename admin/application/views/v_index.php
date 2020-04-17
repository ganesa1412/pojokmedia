<!-- start page -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-featured-bottom panel-featured-success text-center">
			<div class="panel-body">
				<img src="<?php echo base_url('assets/images/admin/'.$this->session->userdata('id_user').'.jpg') ?>" class="img-circle" width="150">
				<h1>Selamat Datang, <font color="#68c3a3"><?php echo $this->session->userdata('name') ?></font> !</h1>
				<br>
				<a href="<?php echo $main_site ?>" class="btn btn-primary btn-sm"><i class="fa fa-globe"></i> &nbsp; Situs Utama</a> &nbsp;
				<a href="<?php echo base_url('profile_settings') ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> &nbsp; Sunting Profil</a> &nbsp;
				<a href="<?php echo base_url('logout') ?>" class="btn btn-danger btn-sm"><i class="fa fa-sign-out"></i> &nbsp; Keluar</a>
			</div>
		</div>
	</div>
</div>
<!-- end: page -->