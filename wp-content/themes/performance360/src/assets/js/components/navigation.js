import $ from 'jquery';

$('.c-main-navigation').on('mouseenter','.menu-item-has-children', (e) => {
    $(e.currentTarget).addClass('open');    
})
$('.c-main-navigation').on('mouseleave','.menu-item-has-children', (e) => {
    $(e.currentTarget).removeClass('open');    
})