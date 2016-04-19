;(function($, window, document, undefined) {
	"use strict";
	

	/*============================*/
	/* SWIPER SLIDE */
	/*============================*/
	
	var swipers = [], winW, winH, winScr, _isresponsive, smPoint = 480, mdPoint = 992, lgPoint = 1200, addPoint = 1600, _ismobile = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i);

	function pageCalculations(){
		winW = $(window).width();
		winH = $(window).height();
	}

	
	
	function updateSlidesPerView(swiperContainer){
		if(winW>=addPoint) return parseInt(swiperContainer.attr('data-add-slides'),10);
		else if(winW>=lgPoint) return parseInt(swiperContainer.attr('data-lg-slides'),10);
		else if(winW>=mdPoint) return parseInt(swiperContainer.attr('data-md-slides'),10);
		else if(winW>=smPoint) return parseInt(swiperContainer.attr('data-sm-slides'),10);
		else return parseInt(swiperContainer.attr('data-xs-slides'),10);
	}

	function resizeCall(){

		$('.swiper-container.initialized[data-slides-per-view="responsive"]').each(function(){
			var thisSwiper = swipers['swiper-'+$(this).attr('id')], $t = $(this), slidesPerViewVar = updateSlidesPerView($t), centerVar = thisSwiper.params.centeredSlides;
			thisSwiper.params.slidesPerView = slidesPerViewVar;
			thisSwiper.reInit();
			if(!centerVar){
				var paginationSpan = $t.find('.pagination span');
				var paginationSlice = paginationSpan.hide().slice(0,(paginationSpan.length+1-slidesPerViewVar));
				if(paginationSlice.length<=1 || slidesPerViewVar>=$t.find('.swiper-slide').length) $t.addClass('pagination-hidden');
				else $t.removeClass('pagination-hidden');
				paginationSlice.show();
			}
		});
		pageCalculations();
	}

	if(!_ismobile){
		$(window).resize(function(){
			resizeCall();
		});
	} else{
		window.addEventListener("orientationchange", function() {
			resizeCall();
		}, false);
	}

	/*=====================*/
	/* 07 - swiper sliders */
	/*=====================*/
	var initIterator = 0;
	function initSwiper(){
		$('.swiper-container').each(function(){								  
			var $t = $(this);								  

			var index = 'swiper-unique-id-'+initIterator;

			$t.addClass('swiper-'+index + ' initialized').attr('id', index);
			$t.find('.pagination').addClass('pagination-'+index);

			var autoPlayVar = parseInt($t.attr('data-autoplay'),10);

			var slidesPerViewVar = $t.attr('data-slides-per-view');
			if(slidesPerViewVar == 'responsive'){
				slidesPerViewVar = updateSlidesPerView($t);
			}
			else slidesPerViewVar = parseInt(slidesPerViewVar,10);

			var loopVar = parseInt($t.attr('data-loop'),10);
			var speedVar = parseInt($t.attr('data-speed'),10);
			var centerVar = parseInt($t.attr('data-center'),10);
			swipers['swiper-'+index] = new Swiper('.swiper-'+index,{
				speed: speedVar,
				pagination: '.pagination-'+index,
				loop: loopVar,
				paginationClickable: true,
				autoplay: autoPlayVar,
				slidesPerView: slidesPerViewVar,
				keyboardControl: true,
				calculateHeight: true, 
				simulateTouch: true,
				roundLengths: true,
				centeredSlides: centerVar
			});
			swipers['swiper-'+index].reInit();
			if($t.attr('data-slides-per-view')=='responsive'){
				var paginationSpan = $t.find('.pagination span');
				var paginationSlice = paginationSpan.hide().slice(0,(paginationSpan.length+1-slidesPerViewVar));
				if(paginationSlice.length<=1 || slidesPerViewVar>=$t.find('.swiper-slide').length) $t.addClass('pagination-hidden');
				else $t.removeClass('pagination-hidden');
				paginationSlice.show();
			}
			initIterator++;
		});

}



	//swiper arrows
	
	$('.swiper-arrow-left').on('click', function(){
		swipers['swiper-'+$(this).closest('.arrows').find('.swiper-container').attr('id')].swipePrev();
	});

	$('.swiper-arrow-right').on('click', function(){
		swipers['swiper-'+$(this).closest('.arrows').find('.swiper-container').attr('id')].swipeNext();
	});


	/*============================*/
	/* WINDOW LOAD */
	/*============================*/

	$(window).load(function(){

		pageCalculations();

		if ($('.izotope-container').length) { 
			
			
			setTimeout(function(){
				var $container = $('.izotope-container');
				$container.isotope({
					itemSelector: '.item',
					masonry: {
						columnWidth: '.grid-sizer'
					}
				});
				
			},500);
			
			setTimeout(function(){
				$('.grid-gallery').each(function(){
					var gallery = $(this);
					gallery.find('.filters').on('click', 'li a', function() {
						gallery.find('.izotope-container .item').removeClass('animated');
						gallery.find('.filters li a').removeClass('activbut');
						$(this).addClass('activbut');
						var filterValue = $(this).attr('data-filter');
						gallery.find('.izotope-container').isotope({filter: filterValue});
						return false;
					}); 
				});
			},300);
			
		}

		initSwiper();
	});
	
	$('.popup-main').css({'left':'-100%'});
	
	$('.item').on('click', function(){
		var item = $(this).closest('.grid-gallery').find('.popup-wrappers');
		item.addClass('act').animate({opacity: 1});	
		item.find('.popup-main[data-rel="' + $(this).data('rel') + '"]').addClass('active').animate({left: '0%'});
	});
	
	$('.popup-next').on('click', function(){
		if($('.popup-main.active').next().hasClass('popup-main')){
			$('.popup-main.active').next().css({'left':'200%'});
			$('.popup-main.active').animate({'left':'-100%'}).next().animate({'left':'0%'}, function(){
				$('.popup-main.active').removeClass('active');
				$(this).addClass('active');
			});
		}

	});
	
	
	$('.popup-prev').on('click', function(){
		if($('.popup-main.active').prev().hasClass('popup-main')){
			$('.popup-main.active').prev().css({'left':'-200%'});
			$('.popup-main.active').animate({'left':'100%'}).prev().animate({'left':'0%'}, function(){
				$('.popup-main.active').removeClass('active');
				$(this).addClass('active');
			});
		}
	});
	
	$('.popup-close').on('click', function(){	
		$('.popup-main.active').removeClass('active').animate({left: '-100%'});
		$('.popup-wrappers').animate({opacity: 0}, function(){
			$(this).removeClass('act');
		});
	});

	function setHeightCarusel(){
		var carusel = $('.carousel.slide'),
			height = 0;

		carusel.each(function(i, this_carusel){
			$(this_carusel).find('.item').each(function(g, item){
				if (height < $(item).height()) {
					height = $(item).height();
				};
			});
			$(this_carusel).css({'height' : height});
		});
	}

	$(window).on('load',function(){
		setHeightCarusel()
	}).on('resize', function(){
		setHeightCarusel();
	});

})(jQuery, window, document);
function setZoom(){
	map.setZoom(2);
}