const swiperEl = document.getElementById('swiper-container-news');
const buttonUp = document.getElementById('scrollUp');
const buttonDown = document.getElementById('scrollDown');

if (buttonUp && buttonDown) {

    buttonDown.addEventListener('click', () => {
        swiperEl.swiper.slideNext();
    });

    buttonUp.addEventListener('click', () => {
        swiperEl.swiper.slidePrev();
    });
}


const swiperAnotherNews = document.getElementById('swiper-container-another-news');
const buttonNext = document.getElementById('scrollRight');
const buttonPrev = document.getElementById('scrollLeft');

buttonNext.addEventListener('click', () => {
    swiperAnotherNews.swiper.slideNext();
});

buttonPrev.addEventListener('click', () => {
    swiperAnotherNews.swiper.slidePrev();
});
