
  <footer class="container-fluid bg-black">
    <div class="row" style="margin-top:40px;margin-bottom: 10px">
      <div class="col-md-6 col-xs-12">
        <center>
          <img src="<?php echo base_url() ?>assets/img/logo-main.png" class="footer-logo">
        </center>
      </div>
      <div class="col-md-5 col-xs-12">
        <nav class="nav pull-right">
          <ul>
            <li class="clickable clr-white upper"><a href="#">tentang pojokmedia</a></li>
            <li class="clr-white">//</li>
            <li class="clickable clr-white upper"><a href="#">tim</a></li>
            <li class="clr-white">//</li>
            <li class="clickable clr-white upper"><a href="#">pasang iklan</a></li>
          </ul>
        </nav>
      </div>
      <div class="col-md-12 col-xs-12 text-center clr-white copy">
        &copy; 2020 POJOKMEDIA.ID
      </div>
    </div>
  </footer>

  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/pomed.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/swiper.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/wow.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jssocials.js"></script>
  <script type="text/javascript">
    var swiper = new Swiper('#swiper-utama', {
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      },
      navigation: {
        nextEl: '.swiper-next',
        prevEl: '.swiper-prev',
      },
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    });
  </script>
  <script type="text/javascript">
    wow = new WOW(
    {
      boxClass:     'wow',     
      animateClass: 'animated',
      offset:       0,         
      mobile:       true,      
      live:         true       
    }
    )
    wow.init();
  </script>
</body>
</html>