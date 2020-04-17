

  <div class="container">
    <div class="row top">
      <center>
        <img src="<?php echo base_url() ?>assets/img/ads-satu.png" class="ads">
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
            <h3 class="col-xs-12 col-md-12 title-news clr-black"><a href="<?php echo base_url('read/'.$article->permalink) ?>"><?php echo $article->title ?></a></h3>
            <span class="col-md-12 col-xs-12 main-author">
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
