<?php
  $post = get_post();
  $post_id = $post->ID;
  $post_title = $post->post_title;
  $post_thumb_id = get_post_thumbnail_id( $post_id );
  $metadata = get_post( $post_thumb_id );
  $metadata_title = $metadata->post_title;
  $metadata_caption = $metadata->post_content;
?>

<?php
  if ( has_post_thumbnail() ) {
?>

  <div class="page_image">

    <?php
      if( $metadata_title || $metadata_caption ) {
        echo '<figure>';
      }

      the_post_thumbnail( 'large' );

      if( $metadata_title || $metadata_caption ) {
        echo '<figcaption class="slider_caption">';
      }

      if( $metadata_title ) {
        echo '<strong>' . $metadata_title . '</strong>';
      }

      if( $metadata_caption ) {
        echo '<p>' . $metadata_caption . '</p>';
      }

      if( $metadata_title || $metadata_caption ) {
        echo '</figcaption>';
      }

      if( $metadata_title || $metadata_caption ) {
        echo '</figure>';
      }
    ?>

  </div>

<?php
  }
?>

<h1 class="page_headline">
  <?php echo $post_title; ?>
</h1>

<div class="page_authors">
  <?php echo render_author_list( $post ); ?>
</div>

<div class="richtext richtext--full-content">
  <?php
    echo apply_filters( 'the_content', $post->post_content );
  ?>
</div>
