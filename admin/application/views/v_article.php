<!-- start page -->
<div class="row">
	<div class="col-md-12">

		<?php 
			if (isset($edit_data)) {
				foreach ($edit_data as $edit) {
		 ?>
		<form class="panel" action="<?php echo base_url('crud/edit_article/'.$edit->id_article) ?>" method="post" enctype="multipart/form-data">
			<div class="panel-heading bg-warning text-center"><h4 style="margin: 0px;">Edit Data</h4></div>
			<div class="panel-body">
					<label>Judul:</label>
					<input type="text" class="form-control" name="title" placeholder="Judul" required="" value="<?php echo $edit->title ?>">
					<br>

					<?php 
						$content_arr = explode("<!-- -->", $edit->content);
						for ($i=0; $i < sizeof($content_arr); $i++) { 
							$type = substr($content_arr[$i], 5,3);
							if ($type == "img") {
								$dt = explode("<!-- capt -->", $content_arr[$i]);
								$st = strlen("<!-- img --><img src='http://pojokmedia.id/assets/img/news/");
								$ed = strlen("' width='100%'>");
								$image = substr($dt[0], $st, strlen($dt[0]) - $st - $ed);

								$st2 = strlen("<br><p><i>");
								$ed2 = strlen(" </i></p>");
								$caption = substr($dt[1], $st2, strlen($dt[1]) - $st2 - $ed2);
					?>
					<div class="multiple removeclass<?php echo $i ?>">
						<input type="hidden" name="type<?php echo $i ?>" value="img">
						<label>Image:</label>
						<input type="hidden" name="previmg<?php echo $i ?>" value="<?php echo $image ?>">
						<div class="alert alert-default" style="width: 40%;">
							<img src="<?php echo $main_site.'assets/img/news/'.$image ?>" width="100%">
						</div>
						<input type="file" class="form-control" name="image<?php echo $i ?>">
						<br>
						<label>Caption:</label>
						<input type="text" placeholder="Caption" class="form-control" name="caption<?php echo $i ?>" value="<?php echo $caption ?>">
						<br>
						<?php if ($i != 1) { ?>
						<button class="btn btn-danger" type="button" onclick="remove_ctn(<?php echo $i ?>)" >
	                        <span class="fa fa-close"></span> Hapus
	                    </button><br><br>
	                    <?php } ?>
					</div>

					<?php
							}else if($type == "ctn"){
								$text = $content_arr[$i];
					?>
					<div class="multiple removeclass<?php echo $i ?>">
						<input type="hidden" name="type<?php echo $i ?>" value="ctn">
						<label>Isi:</label>
						<textarea class="summernote" placeholder="Isi" name="content<?php echo $i ?>"  data-plugin-summernote data-plugin-options='{ "height": 120, "codemirror": { "theme": "ambiance" } }'><?php echo $text ?></textarea>
						<?php if ($i != 2) { ?>
						<button class="btn btn-danger" type="button" onclick="remove_ctn(<?php echo $i ?>)">
	                        <span class="fa fa-close"></span> Hapus
	                    </button><br><br>
	                    <?php } ?>
					</div>
					<?php
							}
						}
					 ?>

					<input type="hidden" name="counter2" id="counter2" value="<?php echo sizeof($content_arr) ?>">
					<div id="ctn-area2"></div>

					<a onclick="addf('#counter2','ctn-area2', 'img')" class="btn btn-info"><i class="fa fa-plus"></i> Gambar</a>
					<a onclick="addf('#counter2','ctn-area2', 'ctn')" class="btn btn-info"><i class="fa fa-plus"></i> Teks</a>
					<br><br>

					<label>Kategori:</label>
					<select class="form-control" name="id_article_category" required="">
						<?php 
							foreach ($ctg as $category) {
						 ?>
						 <option value="<?php echo $category->id_article_category ?>" <?php echo ($edit->id_article_category == $category->id_article_category?'selected':'') ?>><?php echo $category->category_name ?></option>
						 <?php } ?>
					</select>
					<br>

					<label>Keyword:</label>
					<input type="text" class="form-control" name="keyword" placeholder="Keyword" required="" value="<?php echo $edit->keyword ?>">
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
				<button data-toggle="modal" data-target="#tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
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
							<td><img src="<?php echo $main_site.'assets/img/news/'.$article->image ?>" width="100%"></td>
							<td><?php echo $article->title ?></td>
							<td>
								<a href="<?php echo base_url($table.'/view_edit/'.$article->id_article) ?>" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-edit"></i></a>
								&nbsp;
								<a href="<?php echo base_url('/crud/delete/'.$table.'/'.$article->id_article) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data?')" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash"></i></a>
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
<form class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="helpModal" aria-hidden="true" method="post" action="<?php echo base_url('crud/add_article') ?>" enctype="multipart/form-data">
  <div class="modal-dialog">
    <div class="modal-content modal-lg">
      <div class="modal-header header-help bg-primary">
        <button type="button" class="close" style="color:#FFF;opacity:1.0;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-remove"></i></button>
        <h3 class="modal-title text-center" id="myModalLabel">Tambah Data:</h3>
      </div>
      <div class="modal-body">
      	
      	<label>Judul:</label>
		<input type="text" class="form-control" name="title" placeholder="Judul" required="">
		<br>

		<input type="hidden" name="type1" value="img">
		<label>Image:</label>
		<input type="file" class="form-control" name="image1">
		<br>
		<label>Caption:</label>
		<input type="text" placeholder="Caption" class="form-control" name="caption1">
		<br>		

		<input type="hidden" name="type2" value="ctn">
		<label>Isi:</label>
		<textarea class="summernote" placeholder="Isi" name="content2"  data-plugin-summernote></textarea>

		
		<input type="hidden" name="counter" id="counter" value="2">
		<div id="ctn-area"></div>

		<a onclick="addf('#counter','ctn-area', 'img')" class="btn btn-info"><i class="fa fa-plus"></i> Gambar</a>
		<a onclick="addf('#counter','ctn-area', 'ctn')" class="btn btn-info"><i class="fa fa-plus"></i> Teks</a>
		<br><br>

		<label>Kategori:</label>
		<select class="form-control" name="id_article_category" required="">
			<?php 
				foreach ($ctg as $category) {
			 ?>
			 <option value="<?php echo $category->id_article_category ?>"><?php echo $category->category_name ?></option>
			 <?php } ?>
		</select>
		<br>

		<label>Keyword:</label>
		<input type="text" class="form-control" name="keyword" placeholder="Keyword" required="">
		<br>

		<hr>
		<input type="hidden" name="old-post" value="1">
		<label>Tanggal:</label>
		<input type="date" class="form-control" name="date_created">
		<br>
		<label>User:</label>
		<select class="form-control" name="id_user" required="">
			<?php 
				foreach ($usr as $user) {
			 ?>
			 <option value="<?php echo $user->id_user ?>" <?php echo ($this->session->userdata('id_user') == $user->id_user?'selected':''); ?>><?php echo $user->full_name ?></option>
			 <?php } ?>
		</select>
		<br>
      </div>
      <div class="modal-footer text-right">
      	<input type="submit" class="btn btn-primary" value="Tambah">
      </div>
      </div>
    </div>
</form>
<!-- MODAL END -->

