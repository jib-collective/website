<?php
  $post = get_post();
  $post_id = $post->ID;
  $post_title = $post->post_title;
  $post_excerpt = get_field( 'excerpt', $post_id );
  $post_alt_title = get_field( 'alternative_title', $post_id );
  $post_capture_date = get_field( 'capture_date', $post_id );
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

  <?php
    if( $post_capture_date ) {
  ?>

    <p class="page_pubdate"> - <?php echo $post_capture_date; ?></p>

  <?php
    }
  ?>

  <?php
    echo render_post_locations( $post_id );
  ?>
</div>

<div class="richtext richtext--full-content page_excerpt">
  <?php echo $post_excerpt; ?>
</div>

<?php
  if( $post_alt_title ) {
    echo '<h2>' . $post_alt_title . '</h2>';
  }
?>

<div class="richtext richtext--full-content">
  <?php
    echo apply_filters( 'the_content', $post->post_content );
  ?>
</div>

<?php
  echo render_post_publications( $post_id );
?>