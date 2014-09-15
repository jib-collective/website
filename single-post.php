<?php get_header(); ?>

<div class="grid app_content-limiter">
  <?php get_template_part( 'content', get_post_format() ); ?>
</div>

<?php get_footer(); ?>