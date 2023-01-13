$(function() {
  $('.fd .icon-close').click(function() {
      $('.fd').removeClass('opened');
      return false;
  });
  $(document).click( function(event){
      if( $(event.target).closest('.form-wrapper-inner').length || $(event.target).closest('[data-form_id]').length ) 
        return;
      $('.fd').removeClass('opened');
      event.stopPropagation();
  })
  $(document).keydown(function(event){
      if (event.which == 27) {
          $('.fd').removeClass('opened');
      }
  });
    $('.sl_first').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        fade: false,
        // swipe: false,
        // asNavFor: '.sl_navs',
      	autoplay: true,
        centerMode: false,
        customPaging : function(slider, i) {
          return '<div class="main_first__nav"></div>';
      	},
      	appendDots: '.main_first__navs.sl_navs',
  		autoplaySpeed: 3500,
        responsive: [
          {
            breakpoint: 871,
            settings: {
                swipe: true
            }
          },
        ]
    });
  	$('.main_first__navs .main_first__nav').each(function(keyName, keyValue) {
      	let text = $(`.main_first__block[data-slick-index="${keyName}"] .main_first__title`).html();
    	$(this).html(text);
    });
//     $('.sl_navs').slick({
//        slidesToShow: 4,
//        slidesToScroll: 1,
//        asNavFor: '.sl_first',
//        arrows: false,
//        dots: false,    
//        focusOnSelect: false,
//        responsive: [
//          {
//            breakpoint: 871,
//            settings: {
//                variableWidth: true
//            }
//          },
//        ]
//     });
    $('.sl_services').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              dots: true
            }
          },
          {
            breakpoint: 781,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              dots: true
            }
          },
          {
            breakpoint: 481,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              variableWidth: true,
              dots: true
            }
          }
        ]
    });
    $('.sl_reviews').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              dots: false
            }
          },
          {
            breakpoint: 581,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              variableWidth: true,
              dots: false
            }
          }
        ]
    });
    $('.sl_new_news').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              dots: true
            }
          },
          {
            breakpoint: 581,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              variableWidth: true,
              dots: true
            }
          }
        ]
    });
    $('.sl_prods').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              dots: false
            }
          },
          {
            breakpoint: 781,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
              dots: false
            }
          },
          {
            breakpoint: 481,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              variableWidth: true,
              dots: false
            }
          }
        ]
    });
  	var maxHeight = Math.max.apply(null, $(".main_prods__tit").map(function () {
        return $(this).height();
    }).get());
  $('.main_prods__tit').height(maxHeight);
    $('.main_reviews__more').on('click', function() {
        $(this).parents('.main_reviews__block').find('.main_reviews__hide').slideToggle();
        $(this).toggleClass('isActive');
        if ($(this).hasClass('isActive')) {
            $(this).text('Скрыть');
        } else {
            $(this).text('Читать полностью');
        }
    })
})