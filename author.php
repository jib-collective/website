<?php get_header(); ?>

<?php
  $id = the_author_meta( 'ID' );
  $userdata = get_user_meta( $id );
  $bio = $userdata['biography'];

  $posts = query_posts( 'author=' + $id );
?>

<h1>
  <?php the_author() ?>
</h1>

<p>
  <?php echo $bio; ?>
</p>

<?php get_footer(); ?>