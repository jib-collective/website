<?php
  $post = get_post();
  $post_id = $post->ID;
  $post_title = $post->post_title;
?>

<h1 class="page_headline">
  <?php echo $post_title; ?>
</h1>

<?php
  if ( has_post_thumbnail() ) {
    the_post_thumbnail( 'large' );
  }
?>

<div class="richtext">
  <?php
    echo apply_filters( 'the_content', $post->post_content );
  ?>
</div>