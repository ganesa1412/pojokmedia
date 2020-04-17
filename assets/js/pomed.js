$(document).ready(function(){
	// ONSCROLL
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$(".nav-med").addClass('second');
			$(".small-logo").addClass('yes');
		} else {
			$(".nav-med").removeClass('second');
			$(".small-logo").removeClass('yes');
		}
	});

	// SLIDE MENU
	$(".btn-menu").click(function(){
		$(".slide-menu").removeClass('slide-ilang');
		$(".tp-black").removeClass('bg-ilang');
		$(".slide-menu").addClass('slide-muncul');
		$(".tp-black").addClass('bg-muncul');
	});
	$(".tp-black").click(function(){
		$(".slide-menu").removeClass('slide-muncul');
		$(".tp-black").removeClass('bg-muncul');
		$(".slide-menu").addClass('slide-ilang');
		$(".tp-black").addClass('bg-ilang');
	});

	$("#share").jsSocials({
		showLabel: false,
		showCount: true,
		shares: ["facebook", "twitter",  "googleplus", "linkedin", "whatsapp",  "line"]
	});

});