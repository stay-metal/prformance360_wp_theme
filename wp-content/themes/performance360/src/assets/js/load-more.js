import { runMasonry } from "./components/masonry";

jQuery(function($){
	$('.c-load-more__button').click(function(){

		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': performance_loadmore_params.posts,
            'page' : performance_loadmore_params.current_page,
            'is_home': performance_loadmore_params.is_home
		};
 
		$.ajax({
			url : performance_loadmore_params.ajaxurl,
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Загрузка...'); 
			},
			success : function( data ){
				if( data ) { 
					button.text( 'Загрузить еще' );
					$('.o-container_masonry').append(data);
					performance_loadmore_params.current_page++;
 
					if ( performance_loadmore_params.current_page == performance_loadmore_params.max_page ) 
						button.remove(); 
 
				} else {
					button.remove(); 
				}
				runMasonry();
			}
		});
	});
});

var ppp = 3; // Post per page
var pageNumber = 1;


function load_posts(){
    pageNumber++;
    var str = ''&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: str,
        success: function(data){
            var $data = $(data);
            if($data.length){
                $("#ajax-posts").append($data);
                $("#more_posts").attr("disabled",false);
            } else{
                $("#more_posts").attr("disabled",true);
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
}

$("#more_posts").on("click",function(){ // When btn is pressed.
    $("#more_posts").attr("disabled",true); // Disable the button, temp.
    load_posts();
});