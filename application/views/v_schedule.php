<!-- READMORE HEAD -->
	<div class="row text-center" id="rm-head"></div>
	<!-- READMORE HEAD END -->
	<!-- READMORE CONTENT -->
	<div class="row bg-grey" id="rm-content">
		<div class="section">
			<div class="col-md-3">
				<img src="<?php echo base_url() ?>assets/images/logo.png" width="100%">
			</div>
			<div class="col-md-9">
				<h2 class="font-lg font-bold font-white"><?php echo $schedule_res->judul ?></h2>
				<div class="line line-100 bg-white"></div>
				<p class="font-sm font-white font-bold"><?php echo format_2tanggal($schedule_res->tanggal_start, $schedule_res->tanggal_end) ?></p>
			</div>
			<div class="col-md-12">
				<div class="rm-panel bg-white font-md">

					<center><img src="<?php echo base_url() ?>assets/images/schedule/<?php echo $schedule_res->image ?>" width="20%"></center>
					<?php echo $schedule_res->teks ?>
				</div>
			</div>
		</div>
	</div>
	<!-- READMORE CONTENT END -->