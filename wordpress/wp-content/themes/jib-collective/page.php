<?php get_header(); ?>

<?php
  $page = get_post();
?>

<div class="app_content-limiter">

  <?php
    if( $page->post_name != 'about' ) {
  ?>

    <h1 class="page_headline">
      <?php echo $page->post_title; ?>
    </h1>

  <?php
    }
  ?>

  <article class="page richtext richtext--full-content">
    <?php  echo apply_filters( 'the_content', $post->post_content ); ?>
  </article>
</div>

<?php get_footer(); ?>