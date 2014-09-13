<?php
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'post-formats', array( 'gallery', 'video' ) );

  add_image_size( 'featured-category-image', 700 );
  add_image_size( 'category-image', 350 );

  function register_my_menu() {
    register_nav_menu( 'header-menu', __( 'Header Menu' ) );
  }

  add_action( 'init', 'register_my_menu' );

?>