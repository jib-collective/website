<?php get_header(); ?>

<?php
  $post_format = get_post_format();

  if( !$post_format ) {
    $post_format = 'default';
  }
?>

<div class="grid app_content-limiter">
  <?php get_template_part( 'content', $post_format ); ?>
</div>

<?php get_footer(); ?>