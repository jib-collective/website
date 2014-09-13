<?php get_header(); ?>

<div class="page app_content-limiter">
  <?php
    $id = the_author_meta( 'ID' );
    $userdata = get_user_meta( $id );
    $bio = $userdata['biography'];

    $posts = query_posts( 'author=' + $id );
  ?>

  <h1 class="page_headline">
    <?php the_author() ?>
  </h1>

  <p class="richtext">
    <?php echo $bio; ?>
  </p>
</div>

<?php get_footer(); ?>