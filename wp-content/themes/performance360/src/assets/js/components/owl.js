import 'owl.carousel';

const mobileMenu = document.querySelector('.c-main-navigation--mobile');

if (mobileMenu) {
    const owlElement = mobileMenu.querySelector('.menu');
    owlElement.classList.add('owl-carousel', 'owl-theme');
    Array.from(owlElement.querySelectorAll('li')).forEach(el => {
        const width = el.querySelector('a').offsetWidth;
        el.style.width = width;
    })
    jQuery(owlElement).owlCarousel({
        margin:10,
        autoWidth:true,
        items:4
    });
}