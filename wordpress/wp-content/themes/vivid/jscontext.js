var initswiperRecommendItemList = function( instance ) {

    if (scaleWindowW() < 600 && swiperRecommendItemList == undefined) {
        swiperRecommendItemList = new Swiper(swiperRecommendItemListEl, {
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

        swiperRecommendItemListButtonPrev[0].style.display = 'block';
        swiperRecommendItemListButtonNext[0].style.display = 'block';

    } else if (scaleWindowW() >= 600 && swiperRecommendItemList != undefined) {
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