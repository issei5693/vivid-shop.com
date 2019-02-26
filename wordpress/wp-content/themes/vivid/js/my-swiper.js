var breakpoint = 736;

/**
 * swiper setting
 */
// 冗長的担っているのでリファクタリングすること。オススメ商品リストと、人気商品リストの挙動が全く一緒でいいのであれば配列で試してみる。
var scaleWindowW = function() {
    var w = (window.innerWidth || document.documentElement.clientWidth || 0);
    return w;
};

window.addEventListener('DOMContentLoaded', function() {

    // swiper-recommend-itemlist
    var swiperRecommendItemList = undefined; 
    var swiperRecommendItemListEl = document.querySelector('.swiper-container.swiper-recommend-itemlist');
    var swiperRecommendItemListWrapper = swiperRecommendItemListEl.getElementsByClassName('swiper-wrapper');
    var swiperRecommendItemListSlide = swiperRecommendItemListEl.getElementsByClassName('swiper-slide');
    var swiperRecommendItemListButtonPrev = swiperRecommendItemListEl.getElementsByClassName('swiper-button-prev');
    var swiperRecommendItemListButtonNext = swiperRecommendItemListEl.getElementsByClassName('swiper-button-next');

    var initswiperRecommendItemList = function() {

        if (scaleWindowW() < breakpoint && swiperRecommendItemList == undefined) {
            swiperRecommendItemList = new Swiper(swiperRecommendItemListEl, {
                slidesPerView: 1.8,
                spaceBetween: 10,
                preventClicks: false,
                preventClicksPropagation: false,
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

            swiperRecommendItemListButtonPrev[0].style.display = 'block';
            swiperRecommendItemListButtonNext[0].style.display = 'block';

        } else if (scaleWindowW() >= breakpoint && swiperRecommendItemList != undefined) {
            swiperRecommendItemList.destroy();
            swiperRecommendItemList = undefined;    

            for ( var i = 0; i < swiperRecommendItemListWrapper.length; i++ ) {
                swiperRecommendItemListWrapper[i].removeAttribute('style');
            }
            for ( var i =0; i < swiperRecommendItemListSlide.length; i++ ) {
                swiperRecommendItemListSlide[i].removeAttribute('style');
            }

            swiperRecommendItemListButtonPrev[0].style.display = 'none';
            swiperRecommendItemListButtonNext[0].style.display = 'none';

        } else if (scaleWindowW() >= 600 && swiperRecommendItemList == undefined){
            swiperRecommendItemListButtonPrev[0].style.display = 'none';
            swiperRecommendItemListButtonNext[0].style.display = 'none';
        }
    }
    initswiperRecommendItemList();
    window.addEventListener('resize',initswiperRecommendItemList);

    // swiper-popular-itemlist
    var swiperPopularItemList = undefined; 
    var swiperPopularItemListEl = document.querySelector('.swiper-container.swiper-popular-itemlist');
    var swiperPopularItemListWrapper = swiperPopularItemListEl.getElementsByClassName('swiper-wrapper');
    var swiperPopularItemListSlide = swiperPopularItemListEl.getElementsByClassName('swiper-slide');
    var swiperPopularItemListButtonPrev = swiperPopularItemListEl.getElementsByClassName('swiper-button-prev');
    var swiperPopularItemListButtonNext = swiperPopularItemListEl.getElementsByClassName('swiper-button-next');

    var initswiperPopularItemList = function() {

        if (scaleWindowW() < breakpoint && swiperPopularItemList == undefined) {
            swiperPopularItemList = new Swiper(swiperPopularItemListEl, {
                slidesPerView: 1.8,
                spaceBetween: 10,
                preventClicks: false, 
                preventClicksPropagation: false, 
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

            swiperPopularItemListButtonPrev[0].style.display = 'block';
            swiperPopularItemListButtonNext[0].style.display = 'block';

        } else if (scaleWindowW() >= breakpoint && swiperPopularItemList != undefined) {
            swiperPopularItemList.destroy();
            swiperPopularItemList = undefined;    

            for ( var i = 0; i < swiperPopularItemListWrapper.length; i++ ) {
                swiperPopularItemListWrapper[i].removeAttribute('style');
            }
            for ( var i =0; i < swiperPopularItemListSlide.length; i++ ) {
                swiperPopularItemListSlide[i].removeAttribute('style');
            }

            swiperPopularItemListButtonPrev[0].style.display = 'none';
            swiperPopularItemListButtonNext[0].style.display = 'none';

        } else if (scaleWindowW() >= 600 && swiperPopularItemList == undefined){
            swiperPopularItemListButtonPrev[0].style.display = 'none';
            swiperPopularItemListButtonNext[0].style.display = 'none';
        }
    }
    initswiperPopularItemList();
    window.addEventListener('resize',initswiperPopularItemList);

}, false);

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
    }
});

// var itemListSwiper = new Swiper ('.swiper-itemlist', {
//     slidesPerView: 1.8,
//     spaceBetween: 10,
//     centeredSlides : true,
//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//         },
//     pagination: {
//         el: '.swiper-pagination',
//         clickable: true,
//     },
//     controller: {
//         by: 'slide'
//     }
// });