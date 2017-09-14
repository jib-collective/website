<?php get_header(); ?>

<?php
  $POSTS = query_posts( array( 'tag__in' => array( 4 ),
                               'category__in' => array( 3 ),
                               'post_status' => 'publish',
                        ) );

  $FEATURED_POSTS = true;
?>

<?php include( locate_template( 'post-grid.php' ) ); ?>

<?php get_footer(); ?>