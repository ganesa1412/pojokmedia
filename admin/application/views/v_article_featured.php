<!-- start page -->
<div class="row">
	<div class="col-md-12">

		<?php 	
			if (isset($edit_data)) {
				echo "<h1>lohe lohe</h1>";
				foreach ($edit_data as $edit) {
		 ?>
		<form class="panel" action="<?php echo base_url('crud/edit/'.$table.'/'.$edit->id_article_featured) ?>" method="post" enctype="multipart/form-data">
			<div class="panel-heading bg-warning text-center"><h4 style="margin: 0px;">Edit Data</h4></div>
			<div class="panel-body">
				<label>Artikel:</label>
					<select class="form-control" name="id_article" required="">
						<?php 
							foreach ($result2 as $article2) {
						 ?>
						 <option value="<?php echo $article2->id_article ?>" <?php echo ($edit->id_article == $article2->id_article?'selected':'') ?>><?php echo $article2->title ?></option>
						 <?php } ?>
					</select>
					<br>
			</div>
			<div class="panel-footer text-right">
				<input class="btn btn-warning" value="Simpan" type="submit">
				&nbsp;
				<a href="<?php echo base_url('article') ?>" class="btn btn-default">Batal</a>
			</div>
		</form>
		<br><hr><br>
		<?php 
				} 
			}
		?>
		
		<div class="panel panel-featured-bottom panel-featured-success">
			<div class="panel-heading text-right">
			</div>
			<div class="panel-body">
				<table class="table table-responsive table-stripped" id="datatable-default">
					<thead>
						<tr>
							<td width="8%">No.</td>
							<td width="10%">Image</td>
							<td width="20%">Judul</td>
							<td width="12%">Aksi</td>
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
							<td><img src="<?php echo $main_site.'assets/images/article/'.$article->image ?>" width="100%"></td>
							<td><?php echo $article->title ?></td>
							<td>
								<a href="<?php echo base_url($table.'/view_edit/'.$article->id_article_featured) ?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-edit"></i></a>
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