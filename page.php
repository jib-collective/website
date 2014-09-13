<?php get_header(); ?>

<?php
  $page = get_post();
?>

<div>
  <h1>
    <?php echo $page->post_title; ?>
  </h1>

  <article class="page">
    <?php  echo $page->post_content; ?>
  </article>
</div>

<?php get_footer(); ?>