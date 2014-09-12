<?php
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'post-formats', array( 'gallery', 'video' ) );

  add_image_size( 'featured-category-image', 700 );
  add_image_size( 'category-image', 350 );

  register_nav_menus( array(
    'primary'   => __( 'Top primary menu', 'jib-collective' )
  ) );

?>