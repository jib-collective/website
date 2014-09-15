<?php
  $post = get_post();
  $post_id = $post->ID;
  $video_url = get_field( 'video-url', $post_id );
  $video_embed_code = wp_oembed_get( $video_url, array( 'width' => '960px' ) );
?>

<?php
  echo $video_embed_code;
?>

<div class="richtext">
  <?php
    echo apply_filters( 'the_content', $post->post_content );
  ?>
</div>