<!-- CONTENT -->
<div class="container-fluid bg-grey content">
  <div class="row">
    <div class="section">
      <!-- MAIN CONTENT -->
      <div class="col-md-9 main">
        <div class="row">
          <div class="col-md-12">
            <a href="<?php echo $bnr_home->action_link ?>" target="_blank"><img src="<?php echo base_url('assets/images/banner/'.$bnr_home->image) ?>" width="100%" data-aos="fade"></a>

            <h2><?php echo $category ?></h2>

            <?php 
              foreach ($article_res as $article) {
              ?>
              <div class="article-panel" data-aos="fade">
              <div class="col-md-4">
                <div class="article-img" data-image="<?php echo $article->image ?>"></div>
              </div>
              <div class="col-md-8">
                <h2 class="font-bold font-md"><a href="<?php echo base_url('read/'.$article->permalink ) ?>"><?php echo $article->title ?></a></h2>
                <p class="font-light"><?php echo substr(strip_tags($article->content),0,200) . "..."; ?></p>
                <p>
                  <i class="fa fa-user-circle-o"></i> <?php echo $article->name ?>
                  &nbsp;
                  <i class="fa fa-calendar"></i> <?php echo format($article->date_created) ?>
                </p>
              </div>
            </div>
              <?php } ?>

            <!-- <ul class="pagination">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1"><i class="fa fa-chevron-left"></i></a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#"><i class="fa fa-chevron-right"></i></a>
                </li>
              </ul> -->
          </div>
        </div>
      </div>
      <!-- MAIN CONTENT END -->