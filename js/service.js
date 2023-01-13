'use strict';

const swiperIntro = new Swiper('.swiper-intro', {
    direction: 'horizontal',
    loop: true,
observer: true,
	observeSlideChildren: true,
	observeParents: true,
    // If we need pagination
    pagination: {
        clickable: true,
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next-intro',
        prevEl: '.swiper-button-prev-intro',
    },

});

const swiperPortfolio = new Swiper('.swiper-portfolio', {
    direction: 'horizontal',
    loop: false,
	slidesPerView: 3,
    spaceBetween: 30,
	observer: true,
	observeSlideChildren: true,
	observeParents: true,
    // If we need pagination
    pagination: {
        clickable: true,
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next-portfolio',
        prevEl: '.swiper-button-prev-portfolio',
    },
    breakpoints: {
        550: {
            slidesPerView: 1.3,
            spaceBetween: 20
        },
        768: {
            slidesPerView:1.3,
            spaceBetween: 20
        },
    }


});

const swiperTeam = new Swiper('.swiper-team', {
    direction: 'horizontal',
    loop: false,
    spaceBetween: 30,
	observer: true,
	observeSlideChildren: true,
	observeParents: true,
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next-team',
        prevEl: '.swiper-button-prev-team',
    },
    breakpoints: {
        550: {
            slidesPerView: 1.4,
            spaceBetween: 20
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20
        },
		2048: {
			slidesPerView: 4,
		}
    }

});

const btnsMore = [...document.querySelectorAll('.tariffs__box-more')],
    portfolioBlocks = [...document.querySelectorAll('.tariffs__portfolio')];

let btnsData = [];

btnsMore.forEach(e => {
	btnsData.push(e.dataset.more);
    e.addEventListener('click', () => {
        if (portfolioBlocks[btnsData.indexOf(e.dataset.more)].classList.contains('tariffs__portfolio--active')) {
            portfolioBlocks[btnsData.indexOf(e.dataset.more)].classList.remove('tariffs__portfolio--active');
        } else {
            portfolioBlocks[btnsData.indexOf(e.dataset.more)].classList.add('tariffs__portfolio--active');
        }
    });
});

$('[data-form_id]').each( function() {
  $(this).click(function(event) {
  	event.preventDefault();
    const id = $(this).data('form_id');
    console.log($(`[id^="wpcf7-f${id}"]`));
    $(`[id^="wpcf7-f${id}"]`).find('.fd').addClass('opened')
    console.log(123, id);
  })
});

const popupBtns = [...document.querySelectorAll('.btn-popup')],
	  popupWindow = document.querySelector('.service-popup'),
	  popupClose = document.querySelector('.form .close'),
	  popupCloseWrapper = document.querySelector('.service-popup');

popupBtns.forEach( e => {
	e.addEventListener('click', (event) => {
      	event.preventDefault();
		popupWindow.classList.add('service-popup--active');
	});
});

popupClose.addEventListener('click', () => {
		popupWindow.classList.remove('service-popup--active');
});

popupCloseWrapper.addEventListener('click', () => {
		//popupWindow.classList.remove('service-popup--active');
});

$(".form .close").click(function(event) {
	//console.log("!!!");
	$('.service-popup').removeClass("service-popup--active");
});
	  
	  
	  