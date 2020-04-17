<!-- start page -->
<div class="row">
	<div class="col-md-12">

		<?php 
			if (isset($edit_data)) {
				foreach ($edit_data as $edit) {
		 ?>
		<form class="panel" action="<?php echo base_url('crud/edit/'.$table.'/'.$edit->id_order) ?>" method="post" enctype="multipart/form-data">
			<div class="panel-heading bg-warning text-center"><h4 style="margin: 0px;">Detail Order</h4></div>
			<div class="panel-body">
				<table class="table table-striped table-bordered" style="font-size: 20px;">
					<tr>
						<td>Kode Pemesanan</td>
						<td class="text-center">:</td>
						<td><?php echo $edit->kode ?></td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td class="text-center">:</td>
						<td><?php echo $edit->date_created ?></td>
					</tr>
					<tr>
						<td>Nama Customer</td>
						<td class="text-center">:</td>
						<td><?php echo $edit->nama ?></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td class="text-center">:</td>
						<td><?php echo $edit->telepon ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td class="text-center">:</td>
						<td><?php echo $edit->email ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td class="text-center">:</td>
						<td>
							<?php echo $edit->alamat ?><br>
							<?php echo $kecamatan->nama.", ".$kota->nama.", ".$provinsi->nama; ?>
						</td>
					</tr>
					<tr>
						<td>Keluhan</td>
						<td class="text-center">:</td>
						<td>
							<?php echo $service->name ?> &nbsp;<i class="fa fa-caret-right"></i> &nbsp;
							<?php echo $category->name ?>&nbsp; <i class="fa fa-caret-right"></i> &nbsp;
							<?php echo $category_sub->name ?>	
						</td>
					</tr>
					<tr>
						<td>Info Tambahan</td>
						<td class="text-center">:</td>
						<td><?php echo $edit->info_tambahan ?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td class="text-center">:</td>
						<td><?php echo ($edit->diproses == 1?"Sudah Diproses":"Belum Diproses") ?></td>
					</tr>
				</table>
			</div>
			<div class="panel-footer text-right">
				<?php  if ($edit->diproses == 0) { ?>
					<input class="btn btn-success" value="Tandai Sudah Diproses" type="submit" onclick="return confirm('Tandai pesanan ini sebagai sudah diproses?')">
					&nbsp;
				<?php } ?>
				<a href="<?php echo base_url('order') ?>" class="btn btn-default">Batal</a>
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
							<td>Kode Pemesanan</td>
							<td>Nama Customer</td>
							<td>Keluhan</td>
							<td>Status</td>
							<td width="10%">Aksi</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 0;
							foreach ($result as $order) {
								$no++;
						 ?>
						<tr <?php echo ($order->diproses == 0?'style="font-weight:bolder"':'') ?>>
							<td><?php echo $no ?>.</td>
							<td><?php echo $order->kode ?></td>
							<td><?php echo $order->nama ?></td>
							<td><?php echo $order->keluhan ?></td>
							<td><?php echo ($order->diproses==1?"Sudah Diproses":"Belum Diproses") ?></td>
							<td>
								<a href="<?php echo base_url($table.'/view_edit/'.$order->id_order) ?>" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat Detail"><i class="fa fa-eye"></i></a>
								&nbsp;
								<a href="<?php echo base_url('/crud/delete/'.$table.'/'.$order->id_order) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data?')" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
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
      	
      	<label>Nama Kategori:</label>
		<input type="text" class="form-control" name="name" placeholder="Nama Kategori" required="">
		<br>

		<label>Kategori:</label>
		<select class="form-control" name="id_category" required="">
			<?php 
				foreach ($ctg as $order) {
			 ?>
			 <option value="<?php echo $order->id_category ?>"><?php echo $order->name ?></option>
			 <?php } ?>
		</select>
      </div>
      <div class="modal-footer text-right">
      	<input type="submit" class="btn btn-primary" value="Tambah">
      </div>
      </div>
    </div>
</form>
<!-- MODAL END