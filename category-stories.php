<?php get_header(); ?>

<?php
  $POSTS = query_posts(
            array(
              'post_type' => 'post',
              'posts_per_page' => -1,
              'category__in' => array( 3 ),
              'post_status' => 'publish',
            )
          );
?>

<?php include( locate_template( 'post-grid.php' ) ); ?>

<?php get_footer(); ?>