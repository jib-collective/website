<?php get_header(); ?>

<?php
  $POSTS = query_posts(array('post_type' => 'story', 'post_status' => 'publish'));
  $FEATURED_POSTS = true;
?>

<?php include( locate_template( 'post-grid.php' ) ); ?>

<?php get_footer(); ?>