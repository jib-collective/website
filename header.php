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
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
    <meta charset="utf-8" />
  </head>
<body>

<div class="page">
  <header class="header grid">
    <div class="header_logo">
      <?php if( !is_home() ) { ?>
        <a href="/">
      <?php } ?>

        <strong>jib-collective</strong>

      <?php if( !is_home() ) { ?>
        </a>
      <?php } ?>
    </div>

    <?php wp_nav_menu(array( "container" => '',
                             "menu_class" => 'header_menu' )); ?>
  </header>
  <div class="main">