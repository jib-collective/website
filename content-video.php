<?php
  $post = get_post();
  $post_id = $post->ID;
  $post_title = $post->post_title;
  $post_alt_title = get_field( 'alternative_title', $post_id );
  $post_excerpt = get_field( 'excerpt', $post_id );

  $video_url = get_field( 'video-url', $post_id );
  $video_embed_code = wp_oembed_get( $video_url, array( 'width' => '960px' ) );
?>

<div class="page_video">
  <div class="page_video-container">
    <?php
      echo $video_embed_code;
    ?>
  </div>
</div>

<h1 class="page_headline">
  <?php echo $post_title; ?>
</h1>

<div class="page_authors">
  <?php echo render_author_list( $post ); ?>
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