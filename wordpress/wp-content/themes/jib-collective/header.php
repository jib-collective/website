<?php
  $page_title = wp_title( '', false );
  $page_description = get_bloginfo( 'description' );

  if( !$page_title ) {
    $page_title = 'jib-collective';
  } else {
    $page_title .= " | jib-collective";
  }

  if(  is_single() || is_page() ) {
    $post = get_post();
    $page_description = get_field( 'excerpt', $post->ID );
  }
?>

<!doctype html >

<html>
  <head>
    <title><?php echo $page_title; ?></title>

    <?php wp_head(); ?>

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

<?php
  $background = '';

  if( is_page() ) {
    $page_id = $post->ID;
    $background_image_url = get_field( 'background-image', $page_id );



    if( $background_image_url ) {
      $background = $background_image_url;
    }
  }
?>

<body
  <?php
    if( $background ) {
      echo 'style="background-image: url(' . $background . ');"';
    }
  ?>
>

<div class="page">
  <header class="header">
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


    <div class="header_menu-social">
      &copy; <?php echo date( "Y" ); ?>
      <?php

        // find out menu ID
        $menu_slug = "header-social";
        $locations = get_nav_menu_locations();
        $MENU_ITEMS = wp_get_nav_menu_items( $locations[ $menu_slug ] );
        $TEMPLATE_DICRECTORY = get_bloginfo( 'template_directory' );

        echo '<ul class="menu" id="menu-header-social">';

        foreach ( $MENU_ITEMS as $index => $item ) {
          echo '<li class="menu-item">';

          $has_images = array( 'twitter', 'vimeo' );
          $index = strtolower( $item->title );

          if( in_array( $index, $has_images ) ) {
            $image = '<img src="' .
                         $TEMPLATE_DICRECTORY .
                         '/images/' .
                         $index .
                         '-white.svg"' .
                         'class="header_menu-social-image"' .
                      ' />';
          }

          echo '<a href="' . $item->url . '">';
            if( isset( $image ) ) {
              echo $image;
              echo '<span class="u-is-accessible-hidden">' .
                     $item->title .
                   '</span>';
            } else {
              echo $item->title;
            }
          echo '</a>';

          echo '</li>';
        }

        echo "</ul>";
      ?>
    </div>

  </header>

  <div class="main">

