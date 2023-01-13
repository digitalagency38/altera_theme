var swiper = new Swiper('.service_list-swiper', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    loop: true
});

var swiper1 = new Swiper('.service_advertising--swiper', {
  cssMode: true,
    pagination: {
        el: '.swiper-pagination',
    },
    autoplay: {
        // delay: 3000,
    },
    // loop: true
});

var swiper_reveiw = new Swiper('.swiper-container-review', {
  pagination: {
      el: '.swiper-pagination-review',
  },
  navigation: {
      nextEl: '.swiper-button-next-review',
      prevEl: '.swiper-button-prev-review',
  },
  loop: false
});

var swiper_index = new Swiper('.swiper-container-index', {
  pagination: {
      el: '.swiper-pagination-index',
      clickable: true,
  },
  navigation: {
      nextEl: '.swiper-button-next-index',
      prevEl: '.swiper-button-prev-index',
  },
  autoplay: {
    delay: 16000,
    disableOnInteraction: false,
  },
  loop: true
});
