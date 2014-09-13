<?php
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'post-formats', array( 'gallery', 'video' ) );

  add_image_size( 'featured-category-image', 700 );
  add_image_size( 'category-image', 350 );
  add_image_size( 'custom-size', 220, 180 );
  set_post_thumbnail_size( 150, 150 );

  function register_my_menu() {
    register_nav_menu( 'header-menu', __( 'Header Menu' ) );
  }

  function exclude_pages_from_admin( $query ) {
    if ( !is_admin() ) {
      return $query;
    }

    global $pagenow, $post_type;

    if ( $pagenow == 'edit.php' && $post_type == 'page' )
      $query-> query_vars[ 'post__not_in' ] = array( 49, 43 );
  }

  add_action( 'init', 'register_my_menu' );
  add_filter( 'parse_query', 'exclude_pages_from_admin' );

?>