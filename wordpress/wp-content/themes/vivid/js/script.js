
// swiper setting

    var firstViewSwiper = new Swiper ('.swiper-firstview', {
        effect: 'fade',
        autoplay: {
            delay: 3000,
          },
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
        },
        // scrollbar: {
        //     el: '.swiper-scrollbar',
        //     draggable: true,
        // }
    });

    var itemListSwiper = new Swiper ('.swiper-itemlist', {
        slidesPerView: 1.8,
        spaceBetween: 10,
        centeredSlides : true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        }
    });

