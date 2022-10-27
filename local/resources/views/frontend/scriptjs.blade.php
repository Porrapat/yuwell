<script src="{{ asset('frontend/yuwell/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/yuwell/js/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/yuwell/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/yuwell/js/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/yuwell/js/modernizr.js') }}"></script>
<script src="{{ asset('frontend/yuwell/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/yuwell/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('frontend/yuwell/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('frontend/yuwell/js/bootstrap-datepicker.th.min.js') }}"></script>
<script src="{{ asset('frontend/yuwell/js/slick.min.js') }}"></script>

<script type="text/javascript">
	$('.input-group.date').datepicker({
		language: "th"
	});
</script>

<script>
	$(function() {
		var getPage = '<?php echo ($pageName); ?>';
		$(".navbar-nav .nav-item").each(function() {
			var getMenu = $(this).attr("data-page");
			if (getPage == getMenu) {
				$(this).addClass('active');
			}
		});
	});
</script>

<script type="text/javascript">
	$(function() {
		$("#datepicker").datepicker({
			autoclose: true,
			todayHighlight: true
		}).datepicker('update', new Date());
	});
</script>

<script>
	$(document).ready(function() {

		wow = new WOW({
			animateClass: 'animated',
			offset: 100
		});
		wow.init();

	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('.owl-bannerSlide').owlCarousel({
			loop: true,
			margin: 0,
			autoplay: true,
			autoplayTimeout: 8000,
			autoplayHoverPause: true,
			smartSpeed: 2000,
			nav: false,
			dots: true,
			navText: ['&nbsp;', '&nbsp;'],
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 1
				},
				1000: {
					items: 1
				}
			}
		});
	});

	$(document).ready(function() {
		$('.owl-distribution').owlCarousel({
			loop: true,
			margin: 15,
			autoplay: true,
			autoplayTimeout: 8000,
			autoplayHoverPause: true,
			smartSpeed: 1000,
			nav: true,
			dots: false,
			navText: ['&nbsp;', '&nbsp;'],
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 3
				},
				1000: {
					items: 4
				}
			}
		});
	});

	$(document).ready(function() {
		$('.owl-timeline').owlCarousel({
			loop: true,
			margin: 15,
			autoplay: true,
			autoplayTimeout: 8000,
			autoplayHoverPause: true,
			smartSpeed: 1000,
			nav: true,
			dots: true,
			navText: ['&nbsp;', '&nbsp;'],
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 3
				},
				1000: {
					items: 4
				}
			}
		});
	});

	$(".hover").mouseleave(
		function() {
			$(this).removeClass("hover");
		}
	);
</script>

<script type="text/javascript">
	//Slick slider initialize
	$('.slider').slick({
		arrows: false,
		dots: false,
		infinite: true,
		speed: 500,
		autoplay: false,
		autoplaySpeed: 3000,
		slidesToShow: 1,
		slidesToScroll: 1
	});

	//On click of slider-nav childern,
	//Slick slider navigate to the respective index.
	$('.slider-nav > .item').click(function() {
		$('.slider').slick('slickGoTo', $(this).index());
	})

	$('.slider-nav').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: false,
		autoplaySpeed: 2000,
		dots: false,
		arrows: false,
		infinite: true,
		responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
        }
      }
    ]
	});
</script>

<script>
	(function($) {
		"use strict";

		$(function() {
			var header = $(".start-style");
			$(window).scroll(function() {
				var scroll = $(window).scrollTop();

				if (scroll >= 10) {
					header.removeClass('start-style').addClass("scroll-on");
				} else {
					header.removeClass("scroll-on").addClass('start-style');
				}
			});
		});

		//Animation

		$(document).ready(function() {
			$('body.hero-anime').removeClass('hero-anime');
		});

		//Menu On Hover

		$('body').on('mouseenter mouseleave', '.nav-item', function(e) {
			if ($(window).width() > 750) {
				var _d = $(e.target).closest('.nav-item');
				_d.addClass('show');
				setTimeout(function() {
					_d[_d.is(':hover') ? 'addClass' : 'removeClass']('show');
				}, 1);
			}
		});



	})(jQuery);
</script>