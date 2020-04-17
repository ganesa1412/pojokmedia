

  <div class="container" >

    <div class="row top">
      <!-- Swiper -->
      <div class=" col-md-12 col-xs-12" id="box-swiper">
        <div class="swiper-container" id="swiper-utama">
          <div class="swiper-wrapper">
            <?php foreach ($slider_res as $slide) { ?>
            <div class="swiper-slide col-md-12 col-xs-12" style="background: url(<?php echo base_url() ?>assets/img/news/<?php echo $slide->image ?>);">
              <div class="col-md-12 co-xs-12 tp-slide">
                <div class="title-section">
                  <div class="col-md-10 col-xs-12">
                    <p class="col-md-12 col-xs-12 clr-white title-slide"><?php echo $slide->title ?></p>
                    <div class="col-md-6 col-xs-12 bg-blue"></div>
                    <div class="news-slide col-md-10 col-xs-12 clr-white">
                      <?php echo substr(strip_tags($slide->content), 0, 150) ?>...
                    </div>
                  </div>
                  <div class="col-md-2 col-xs-12">
                    <a href="<?php echo base_url('read/'.$slide->permalink) ?>" class="btn clr-white col-md-12 col-xs-12 bg-blue btn-read">BACA</a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
          <!-- NAV -->
          <div class="np text-right">
            <button class="btn bg-black clr-white swiper-prev"><i class="zmdi zmdi-arrow-left"></i></button>
            <button class="btn bg-black clr-white swiper-next"><i class="zmdi zmdi-arrow-right"></i></button>
          </div>
        </div>
      </div>
      <!-- END SWIPER -->
    </div>
    <div class="row">
      <center>
        <a href="#"><img src="<?php echo base_url() ?>assets/img/ads-satu.png" class="ads"></a>
      </center>
    </div>
    <div class="row" style="margin-top: 30px">
      <!-- LEFT -->
      <div class="col-md-9 col-xs-12" style="padding: 0 !important;">
        <?php foreach($article_res as $article){ ?>
        <div class="card-news col-md-12 col-xs-12 wow animated fadeInUp">
          <div class="col-md-4 col-xs-12 box-img-news">
            <img src="<?php echo base_url() ?>assets/img/news/<?php echo $article->image ?>" class="col-md-12 col-xs-12">   
          </div>
          <div class="col-md-8 col-xs-12">
            <span class="label <?php echo 'bg-'.$rubcolor[$article->rubric_name] ?> category"><?php echo $article->rubric_name ?></span>
            <span class="label <?php echo 'bg-'.$rubcolor[$article->rubric_name] ?> category"><?php echo $article->category_name ?></span>
            <h3 class="title-news clr-black"><a href="<?php echo base_url('read/'.$article->permalink) ?>"><?php echo $article->title ?></a></h3>
            <span class="main-author">
              <span class="label bg-grey clr-black"><?php echo $article->full_name ?></span>
              <span class="label bg-grey clr-black"><?php echo format($article->date_created) ?></span>
            </span>
            <p class="news col-md-11 col-xs-12">
              <?php echo substr(strip_tags($article->content), 0, 150) ?>...
            </p>
          </div>
        </div>
        <?php } ?>

        <!-- PAGINATION -->
        <?php 
            echo $this->pagination->create_links();
          ?>
        <!-- <div aria-label="Page navigation" class="col-md-12 col-xs-12 main-pag" >
          <ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true"><i class="zmdi zmdi-arrow-left"></i></span>
              </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true"><i class="zmdi zmdi-arrow-right"></i></span>
              </a>
            </li>
          </ul>
        </div> -->

      </div><!-- END LEFT -->
