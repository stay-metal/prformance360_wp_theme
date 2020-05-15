import $ from 'jquery';

$('.c-main-navigation').on('mouseenter','.menu-item-has-children', (e) => {
    $(e.currentTarget).addClass('open');    
})
$('.c-main-navigation').on('mouseleave','.menu-item-has-children', (e) => {
    $(e.currentTarget).removeClass('open');    
})

// mobile search
const mobileSearchTrigger = document.querySelector('.mobile-search__trigger');
const mobileSearchForm = document.querySelector('.mobile-search__form');

if (mobileSearchTrigger && mobileSearchForm) {
    mobileSearchTrigger.onclick = (event) => {
        const el = event.target;
        if (el.dataset.open === 'false') {
            el.dataset.open = true;
            mobileSearchForm.classList.add('open');

        } else {
            el.dataset.open = false;
            mobileSearchForm.classList.remove('open');
        }
    }
}