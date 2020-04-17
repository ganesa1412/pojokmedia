
      <!-- RIGHT -->
      <div class="col-md-3 col-xs-12 text-center">
        <div class="row text-center">
          <a href="http://instagram.com/aikomerch/" target="_blank"><img src="<?php echo base_url() ?>assets/img/banner/sidetop.jpg" class="box-ads-two"></a>
        </div>
        <div class="row text-center main-more">
          <div class="col-md-12 col-xs-12">
            <p class="clr-blue col-md-12 col-xs-12 text-center h4">ARTIKEL TERPOPULER</p>
            <div class="col-md-4 col-md-offset-4 bg-blue"></div>
          </div>

          <?php foreach ($popular_res as $pop) { ?>
              <div class="col-md-12 col-xs-12 card-more" style="background: url(<?php echo base_url() ?>assets/img/news/<?php echo $pop->image ?>);">
                <a href="<?php echo base_url('read/'.$pop->permalink) ?>" class="col-md-12 col-xs-12 bg-tp clr-white">
                  <?php echo $pop->title ?>
                </a>
              </div>
            <?php } ?>
        </div>
        <div class="row text-center">
          <a href="http://instagram.com/aikomerch/" target="_blank"><img src="<?php echo base_url() ?>assets/img/banner/sidemid.jpg" class="box-ads-two"></a>
        </div>
        <div class="row text-center main-more">
          <div class="col-md-12 col-xs-12">
            <p class="clr-blue col-md-12 col-xs-12 text-center h4">ARTIKEL PILIHAN</p>
            <div class="col-md-4 col-md-offset-4 bg-blue"></div>
          </div>

          <?php foreach ($random_res as $rand) { ?>
              <div class="col-md-12 col-xs-12 card-more" style="background: url(<?php echo base_url() ?>assets/img/news/<?php echo $rand->image ?>);">
                <a href="<?php echo base_url('read/'.$rand->permalink) ?>" class="col-md-12 col-xs-12 bg-tp clr-white">
                  <?php echo $rand->title ?>
                </a>
              </div>
            <?php } ?>
        </div>

        <div class="row text-center">
          <a href="http://instagram.com/aikomerch/" target="_blank"><img src="<?php echo base_url() ?>assets/img/banner/sidebot.jpg" class="box-ads-two"></a>
        </div>
      </div>
      <!-- END RIGHT -->
    </div>
    <div class="row">
      <center>
        <img src="<?php echo base_url() ?>assets/img/ads-satu.png" class="ads">
      </center>
    </div>
  </div><!-- END CONTAINER -->