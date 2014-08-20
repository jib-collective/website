<!doctype html />

<html>
  <head>
    <title>Tutorial theme</title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
  </head>
<body>

<div class="page">
  <header class="header grid">
    <div class="header_logo">
      <strong>jib-collective</strong>
    </div>

    <?php wp_nav_menu(array( "container" => '',
                             "menu_class" => 'header_menu' )); ?>
  </header>
  <div class="main">