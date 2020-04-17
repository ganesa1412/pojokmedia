<!-- start page -->
<div class="row">
	<div class="col-md-12">
		<?php 
			if (isset($edit_data)) {
				foreach ($edit_data as $edit) {
		 ?>
		<form class="panel" action="<?php echo base_url('crud/edit/about/'.$edit->id_about) ?>" method="post" enctype="multipart/form-data">
			<div class="panel-heading bg-warning text-center"><h4 style="margin: 0px;">Edit Data</h4></div>
			<div class="panel-body">
					<input type="hidden" name="field" value="<?php echo $field ?>">

					<?php if ($field_caption == 'Contact') { ?>
						<label>Telepon :</label><br>
						<input type="text" class="form-control" name="phone" placeholder="Telepon" required="" value="<?php echo $edit->phone ?>"><br>
						<label>Email :</label><br>
						<input type="text" class="form-control" name="email" placeholder="Email" required="" value="<?php echo $edit->email ?>"><br>
						<label>Facebook URL :</label><br>
						<input type="text" class="form-control" name="facebook" placeholder="Facebook URL" required="" value="<?php echo $edit->facebook ?>"><br>
						<label>Instagram URL :</label><br>
						<input type="text" class="form-control" name="instagram" placeholder="Instagram URL" required="" value="<?php echo $edit->instagram ?>"><br>
					<?php }else{ ?>
						<label><?php echo $field_caption ?> :</label><br>
						<textarea class="summernote" placeholder="<?php echo $field_caption ?>" name="value"  data-plugin-summernote data-plugin-options='{ "height": 120, "codemirror": { "theme": "ambiance" } }'><?php echo $edit->$field ?></textarea>
					<?php } ?>
					<br>
			</div>
			</div>
			<div class="panel-footer text-right">
				<input class="btn btn-warning" value="Simpan" type="submit">
				&nbsp;
				<a href="<?php echo base_url('about') ?>" class="btn btn-default">Batal</a>
			</div>
		</form>
		<br><hr><br>
		<?php
				}
			}
		 ?>

	</div>
</div>
<!-- end: page -->

