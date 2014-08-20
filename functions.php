<?php
  add_theme_support( 'post-thumbnails' );
  add_action( 'init', 'create_post_types' );

  function create_post_types() {
    register_post_type( 'work_gallery',
      array(
        'labels' => array(
          'name' => __( 'Work Gallery' ),
          'singular_name' => __( 'Work Gallery' )
        ),
      'public' => true,
      'has_archive' => false,
      )
    );

    register_post_type( 'work_text',
      array(
        'labels' => array(
          'name' => __( 'Work Text' ),
          'singular_name' => __( 'Work Text' )
        ),
      'public' => true,
      'has_archive' => false,
      )
    );

    register_post_type( 'work_video',
      array(
        'labels' => array(
          'name' => __( 'Work Video' ),
          'singular_name' => __( 'Work Video' )
        ),
      'public' => true,
      'has_archive' => false,
      )
    );
  }

?>