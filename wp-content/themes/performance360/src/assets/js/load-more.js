import { runMasonry } from "./components/masonry";




jQuery(function($){
	$('.c-load-more__button-tags').click(function(){
		console.log(posts_tag);

 
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': posts_tag,
            'page' : current_page_tag,
            'is_home': ''
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
					$('.o-container__page-loop').append(data);
					current_page_tag++;
 
					if ( current_page_tag == max_page_tag ) 
						button.remove(); 
 
				} else {
					button.remove(); 
				}
			}
		});
	});
});



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
