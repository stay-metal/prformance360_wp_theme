import 'owl.carousel';


const initOwlMenu = () => {
    const mobileMenu = document.querySelector('.c-main-navigation--mobile');

    if (mobileMenu && mobileMenu.offsetParent !== null) {
        const owlElement = mobileMenu.querySelector('.menu');
        owlElement.classList.add('owl-carousel', 'owl-theme');
        Array.from(owlElement.querySelectorAll('li')).forEach(el => {
            const width = el.querySelector('a').offsetWidth;
            el.setAttribute('style', `width: ${width}px`);
        });
        jQuery(owlElement).owlCarousel({
            margin: 10,
            autoWidth: true,
            items: 2
        });
    }
}

initOwlMenu();


window.onresize = () => {
    initOwlMenu();
}