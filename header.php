<?php
  $page_title = wp_title( '', false );
  $page_description = get_bloginfo( 'description' );
  $css_directory = get_bloginfo( 'template_directory' );

  if( !$page_title ) {
    $page_title = 'jib collective | progressive multimedia journalism';
  } else {
    $page_title .= " | jib collective";
  }

  if(  is_single() || is_page() ) {
    $post = get_post();
    $page_description = get_field( 'excerpt', $post->ID );
  }
?>

<!doctype html>

<html>
  <head>
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet"
          href="<?php echo get_template_directory_uri(); ?>/css/style.css" />
    <meta name="viewport"
          content="initial-scale=1" />
    <meta name="google-site-verification"
          content="JNm4PqE2SljkbSBV8slKmnDb4QMxYXv5tCHl7VD3G0M" />

    <?php
      if( $page_description ) {
    ?>

      <meta name="description"
            content="<?php echo wp_strip_all_tags( $page_description ); ?>" />

    <?php
      }
    ?>

  </head>

<body>

<div class="page">
  <header class="header u-clearfix">
    <div class="header_logo">
      <?php if( !is_home() ) { ?>
        <a href="/">
      <?php } ?>

        <img class="header_logo-image"
             src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" />

      <?php if( !is_home() ) { ?>
        </a>
      <?php } ?>
    </div>

    <?php wp_nav_menu(array( "theme_location" => "header-menu",
                             "container" => '',
                             "menu_class" => 'header_menu' )); ?>

  </header>

  <div class="main">
