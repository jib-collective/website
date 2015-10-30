<?php
  $post = get_post();
  $post_id = $post->ID;
  $post_title = $post->post_title;
  $post_alt_title = get_field( 'alternative_title', $post_id );
  $post_excerpt = get_field( 'excerpt', $post_id );
  $post_below_excerpt = get_field( 'below_excerpt', $post_id );
  $post_capture_date = get_field( 'capture_date', $post_id );

  $video_url = get_field( 'video-url', $post_id );
  $video_embed_code = wp_oembed_get( $video_url, array( 'width' => '960px' ) );

  $post_thumbnail = wp_get_attachment_image_src(
                                            get_post_thumbnail_id($post_id),
                                            'featured-category-image'
                                          );
?>

<div class="page_video"
     style="background-image: url(<?php echo $post_thumbnail[0]; ?>)">
  <div class="page_video-container">
    <?php
      echo $video_embed_code;
    ?>
  </div>

  <div class="page_video-overlay-content">
    <div class="app_content-limiter">
      <img src="<?php echo get_template_directory_uri(); ?>/images/play-circle-o.svg"
            class="page_video-play-button"/>

      <h1 class="page_headline">
        <?php echo $post_title; ?>
      </h1>

      <div class="richtext richtext--full-content page_excerpt">
        <?php echo $post_excerpt; ?>
      </div>

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
    </div>
  </div>
</div>

<?php
  if($post_below_excerpt || $post->post_content ) {
?>

  <div class="page_text app_content-limiter">
    <?php
      if( $post_below_excerpt ) {
    ?>

      <div class="richtext richtext--full-content">
        <?php echo $post_below_excerpt; ?>
      </div>

    <?php } ?>

    <?php
      echo render_post_publications( $post_id );
    ?>

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
  </div>

<?php
  }
?>
