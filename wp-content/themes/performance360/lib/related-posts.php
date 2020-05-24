<?php

function _themname_get_related_posts( $post_id, $related_count, $args = array() ) {
    // $terms = get_the_terms( $post_id, 'tags' );
    $terms = get_the_tags( $post_id);
    
    if (isset($terms) && !empty($terms))  {
    foreach ($terms as $key => $tag) {
      $page = get_term_meta($tag->term_id, '_themename_page_field', true);
      $color = get_term_meta($tag->term_id, '_themename_tag_color', true);
      $bgColor = get_term_meta($tag->term_id, '_themename_tag_bg_color', true);
      if (isset($page) && $page != '') {
      $terms[$key]->page_rel = $page;
      if (isset($color)) {
        $terms[$key]->color = $color;
        }
        if (isset($bgColor)) {
        $terms[$key]->bgColor = $bgColor;
        }
      } else {
        unset($terms[$key]);
      }

    }
  }

    if ( empty( $terms ) ) $terms = array();
    
    $term_list = wp_list_pluck( $terms, 'slug' );

    $related_args = array(
      'post_type' => 'post',
      'posts_per_page' => $related_count,
      'post_status' => 'publish',
      'post__not_in' => array( $post_id ),
      'orderby' => 'rand',
      'tag' => $term_list
      // 'tax_query' => array(
      //   array(
      //     'taxonomy' => 'tags',
      //     'field' => 'term_id',
      //     'terms' => $term_list
      //   )
      // )
    );

    return new WP_Query( $related_args );
  }
    ?>