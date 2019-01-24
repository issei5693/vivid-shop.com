
// swiper setting
var mySwiper = new Swiper ('.swiper-container', {
    // effect: "flip",
	loop: true,
	navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
    },
    scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true,
    }
}) 