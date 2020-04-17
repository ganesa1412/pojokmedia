<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = 'http://localhost/logis/';
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Logis</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/swiper.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo $base_url ?>assets/fonts/fonts.css">
    <link rel="icon" href="<?php echo $base_url ?>assets/images/icon.png">
</head>

<body>
	<div class="header404">
		<div class="col-md-6 col-md-offset-6" align="center">
			<div class="fs-bold clr-white fs-120 margintop-200">404</div>
			<div class="fs-bold clr-white fs-28" style="letter-spacing: 15px; line-height: 15px">Not Found</div>
			<div class="row margintop-50">
				<div class="col-md-4 col-md-offset-4">
					<div class="button white fs-bold" onclick="window.location.assign('<?php echo $base_url ?>')">Kembali Ke Beranda</div>
				</div>
			</div>

		</div>
	</div>
    <script src="<?php echo $base_url ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $base_url ?>assets/js/gc.js"></script>
    <script src="<?php echo $base_url ?>assets/js/aos.js"></script>
    <script src="<?php echo $base_url ?>assets/js/index.js"></script>
    <script src="<?php echo $base_url ?>assets/js/swiper.js"></script>
    <script src="<?php echo $base_url ?>assets/js/swiper.min.js"></script>
</body>
</html>
