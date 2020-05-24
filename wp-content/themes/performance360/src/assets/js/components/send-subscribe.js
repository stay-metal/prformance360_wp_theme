import $ from 'jquery';

  
  $('.js-modal-hide').click(function(){

    $('.js-modal-shopify').toggleClass('is-shown--off-flow').toggleClass('is-hidden--off-flow');
  });
  $('.l-modal__close').click(function(){
    $('.js-modal-shopify').toggleClass('is-shown--off-flow').toggleClass('is-hidden--off-flow');
});

$(".widget_subscribe_widget__form-submit").click(function(e){
    e.preventDefault(); // if the clicked element is a link

    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    var address =  $(".widget_subscribe_widget__form-input").val();

    if(reg.test(address) == false) {
        $( ".с-popup_description-subscribe" ).html('Введите корректный e-mail адрес.');
        $('.js-modal-shopify').toggleClass('is-shown--off-flow').toggleClass('is-hidden--off-flow');
     } else {


	var data = {
        action: 'performance_subscribe_send',
        email: address
    };
    $.post( $("#ajax_url").val(), data, function(response) {
        if(response) {
            $( ".с-popup_description-subscribe" ).html('Не удалось отправить запрос.<br> Попробуйте позже.');
            $('.js-modal-shopify').toggleClass('is-shown--off-flow').toggleClass('is-hidden--off-flow');
            // alert('not');
        } else {
            $( ".с-popup_description-subscribe" ).html('Запрос успешно отправлен!');
            $('.js-modal-shopify').toggleClass('is-shown--off-flow').toggleClass('is-hidden--off-flow');
            // alert('yes');
        }
    });

}

  
  });