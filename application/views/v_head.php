<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title ?></title>
  <meta name="description" content="<?php echo $description ?>" />
  <meta name="keywords" content="<?php echo $keywords ?>" />
  <meta name="author" content="<?php echo $author ?>" />
  <?php if($isReadPage == true){  ?>
    <meta property="og:url"                content="<?php echo base_url('read/'.$share_url) ?>" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="<?php echo $title ?>" />
    <meta property="og:description"        content="<?php echo $description ?>" />
    <meta property="og:image"              content="<?php echo base_url('assets/img/news/'.$share_img) ?>" />
    <?php } ?>
  <link rel="icon" href="<?php echo base_url() ?>assets/img/favicon.jpg">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/pomed.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/swiper.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/responsive.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/animate.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jssocials.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/jssocials-theme-plain.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/material-design-iconic-font.min.css">
  <style type="text/css">
  .ads{
    display: none !important;
  }
</style>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-155757179-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-155757179-1');
</script>
<script data-ad-client="ca-pub-3083608200905431" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body>
  
  <!-- MEDIUM -->
  <div class="container-fluid header hide-mob first anim nav-med">
    <div class="row main-logo first anim">
      <center>
        <img src="<?php echo base_url() ?>assets/img/logo-main.png" class="logo big anim">
      </center>
    </div>
    <nav class="row nav bg-white">
      <img src="<?php echo base_url() ?>assets/img/logo-main.png" style="width: 75px" class="pull-left small-logo no anim">
      <center>
        <ul>
          <li class="clickable clr-black upper"><a href="<?php echo base_url() ?>">Beranda</a></li>
          <li>//</li>
          <?php 
            foreach ($rubric_res as $rubric) { 
              $rub_url = strtolower(str_replace(' ', '-', str_replace('&', 'and', $rubric->rubric_name)));
          ?>
            <li class="clickable clr-black upper"><a href="<?php echo base_url('rubric/'.$rub_url) ?>"><?php echo $rubric->rubric_name ?></a></li>
            <li>//</li>
           <?php } ?>
          <li class="clickable clr-black upper" data-toggle="modal" data-target="#myModal">Search</li>
        </ul>
      </center>
    </nav>
  </div>

  <!-- SMALL -->
  
  <div class="container-fluid header show-mob nav-mob">
    <div class="row nav-mob">
      <div class="col-xs-4">
          <button class="btn text-center btn-mob btn-menu"><i class="zmdi zmdi-menu"></i></button>
      </div>
      <img src="<?php echo base_url() ?>assets/img/logo-main.png" class="col-xs-4">
      <div class="col-xs-4 text-right">
          <button class="btn text-center btn-mob" type="button" data-toggle="modal" data-target="#myModal"><i class="zmdi zmdi-search"></i></button>
      </div>
    </div>
  </div>

  <div class="tp-black bg-ilang"></div>
  <div class="slide-menu bg-white slide-ilang anim">
    <img src="<?php echo base_url() ?>assets/img/logo-main.png">
    <ul>
      <li class="upper clr-blue"><a href="<?php echo base_url() ?>">Beranda</a></li>

      <?php 
        foreach ($rubric_res as $rubric) { 
          $rub_url = strtolower(str_replace(' ', '-', str_replace('&', 'and', $rubric->rubric_name)));
      ?>
      <li class="upper clr-blue"><a href="<?php echo base_url('rubric/'.$rub_url) ?>"><?php echo $rubric->rubric_name ?></a></li>
      <?php } ?>
      <hr>
      <li class="upper clr-blue"><a href="<?php echo base_url() ?>">Tentang PojokMedia</a></li>
      <li class="upper clr-blue"><a href="<?php echo base_url() ?>">Tim</a></li>
      <li class="upper clr-blue"><a href="<?php echo base_url() ?>">Pasang Iklan</a></li>
    </ul>
  </div>
  <!-- END NAV -->
  
  <!--MODAL-->
  <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Pencarian</h4>
          </div>
          <div class="modal-body">
            <form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="Cari...">
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
    
      </div>
    </div>