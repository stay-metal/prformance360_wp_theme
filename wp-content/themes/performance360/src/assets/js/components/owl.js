import 'owl.carousel';


const initOwlMenu = () => {
    const mobileMenu = document.querySelector('.c-main-navigation--mobile');

    if (mobileMenu && mobileMenu.offsetParent !== null) {
        const owlElement = mobileMenu.querySelector('.menu');
        Array.from(owlElement.querySelectorAll('li')).forEach(el => {
            const width = el.querySelector('a').offsetWidth;
            el.setAttribute('style', `width: ${width}px`);
        });
        jQuery(owlElement).owlCarousel({
            margin: 10,
            loop: true,
            autoWidth: true
        });
    }
}

initOwlMenu();


window.addEventListener('resize', () => {
    initOwlMenu();
});

// init home page slider
const homePageSlider = document.querySelector('.js_slider-carousel');

if (homePageSlider) {
    jQuery(homePageSlider).owlCarousel({
        loop: true,
        margin: 20,
        items: 4,
        responsiveClass: true,
        dots: true,
        dotsEach: true,
        responsive: {
            0: {
                items: 1,
                nav: false,
                dots: true
            },
            600: {
                items: 1,
                nav: false,
                dotsEach: true
            },
            1000: {
                items: 4,
                nav: true,
                loop: false,
                dotsEach: true
            }
        }
    })
}