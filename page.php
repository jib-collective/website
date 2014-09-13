<?php get_header(); ?>

<?php
  $page = get_post();
?>

<div class="app_content-limiter">
  <h1 class="page_headline">
    <?php echo $page->post_title; ?>
  </h1>

  <article class="page richtext">
    <?php  echo $page->post_content; ?>
  </article>
</div>

<?php get_footer(); ?>