
	jQuery( document ).ready(function($) {
		console.log( "ready!" );
		$('.filtering').slick({
			slidesPerRow: 4,
			 slidesToScroll: 4,
			centerMode :true,
			Infinity :true,
			// autoplay: true, 
			// autoplaySpeed: 2000,
			
			
			
		  });
		  
		  var filtered = false;
		  
		  $('.js-filter').on('click', function(){
			if (filtered === false) {
			  $('.filtering').slick('slickFilter',':even');
			  $(this).text('Unfilter Slides');
			  filtered = true;
			} else {
			  $('.filtering').slick('slickUnfilter');
			  $(this).text('Filter Slides');
			  filtered = false;
			}
		  });
	});
	jQuery( document ).ready(function($) {
		console.log( "ready!" );
		$('.filteringg').slick({
			slidesPerRow: 3,
			 slidesToScroll: 2,
			centerMode :true,
			Infinity :true,
			// autoplay: true, 
			// autoplaySpeed: 2000,
			
			
			
		  });
		  
		  var filtered = false;
		  
		  $('.js-filter').on('click', function(){
			if (filtered === false) {
			  $('.filteringg').slick('slickFilter',':even');
			  $(this).text('Unfilter Slides');
			  filtered = true;
			} else {
			  $('.filteringg').slick('slickUnfilter');
			  $(this).text('Filter Slides');
			  filtered = false;
			}
		  });
	});
jQuery(document).ready(function(){
		$('.carousel').slick({
		  autoplay: true,
		  autoplaySpeed: 2000,
		
		  arrows: false,
		  infinite: true,
		  speed: 500,
		  slidesToShow: 1,
		  slidesToScroll: 1
		});
		var filtered = false;
		  
		$('.js-carousel').on('click', function(){
		  if (filtered === false) {
			$('.carousel').slick('slickFilter',':even');
			$(this).text('Unfilter Slides');
			filtered = true;
		  } else {
			$('.carousel').slick('slickUnfilter');
			$(this).text('Filter Slides');
			filtered = false;
		  }
		});
	  });

	  

