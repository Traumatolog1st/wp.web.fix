jQuery(document).ready(function(){
	jQuery(".burger").click(function(){
		if (jQuery('.nav').css('display') == 'none') {
			// jQuery('.nav').css('opacity','1');
			// jQuery('.nav').fadeIn(300).css('display','block');
			jQuery('.nav').css('display','block');
		}else{
			// jQuery('.nav').css('opacity','0');
			// jQuery('.nav').fadeOut(300).css('display','none');
			jQuery('.nav').css('display','none');
		}
		// $(".menu").fadeIn();
	});
});

jQuery(document).ready(function(){
	jQuery('.responsive').slick({
	  dots: false,
	  infinite: true,
	  speed: 300,
	  slidesToShow: 4,
	  slidesToScroll: 4,
	  responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	      	arrows: false,
	        slidesToShow: 3,
	        slidesToScroll: 3,
	        infinite: false,
	        dots: false
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	      	arrows: false,
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	      	arrows: false,
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }
	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});
});

jQuery(document).ready(function(){
	jQuery('input#f-name, input#l-name, input#email').unbind().blur( function(){

		var id = $(this).attr('id');
        var val = $(this).val();

		switch(id) {
			case 'f-name':
				if (val.length < 3) {
					jQuery(this).addClass('not-valid');
				}else{

					jQuery(this).removeClass('not-valid').addClass('valid');
				}
			break;
			case 'l-name':
				if (val.length < 3) {
					jQuery(this).addClass('not-valid');
				}else{

					jQuery(this).removeClass('not-valid').addClass('valid');
				}
			break;
			case 'email':
				if (val.length < 3) {
					jQuery(this).addClass('not-valid');
				}else{

					jQuery(this).removeClass('not-valid').addClass('valid');
				}
			break;
		}
	});
});