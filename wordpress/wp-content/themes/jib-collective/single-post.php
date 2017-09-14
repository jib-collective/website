<?php get_header(); ?>

<?php
  $post_format = get_post_format();

  if( !$post_format ) {
    $post_format = 'default';
  }
?>

<?php get_template_part( 'content', $post_format ); ?>

<?php get_footer(); ?>