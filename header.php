<!doctype html />

<?php
  $pagetitle = wp_title( '', false );

  if( !$pagetitle ) {
    $pagetitle = 'jib-collective';
  } else {
    $pagetitle .= " | jib-collective";
  }
?>

<html>
  <head>
    <title><?php echo $pagetitle; ?></title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
    <meta charset="utf-8" />
  </head>
<body>

<div class="page">
  <header class="header grid">
    <div class="app_content-limiter">
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

      <?php wp_nav_menu(array( "container" => '',
                               "menu_class" => 'header_menu' )); ?>
    </div>
  </header>
  <div class="main">