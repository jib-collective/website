<?php
  $post = get_post();
  $post_id = $post->ID;
  $post_title = $post->post_title;
  $images = get_field( 'images', $post_id );
  $post_alt_title = get_field( 'alternative_title', $post_id );
  $post_excerpt = get_field( 'excerpt', $post_id );
  $post_below_excerpt = get_field( 'below_excerpt', $post_id );
  $post_capture_date = get_field( 'capture_date', $post_id );
?>


<div class="slider">
  <div class="slider_row">
    <div class="app_content-limiter">
      <div class="slider_container">
        <div class="seq-canvas">
          <?php
            foreach( $images as $index => $image ) {
          ?>
            <div class="slider_slide">
              <?php
                $image_id = $image[ 'ID' ];
                $metadata = get_post( $image_id );
                $metadata_title = $metadata->post_title;
                $metadata_caption = $metadata->post_content;

                if( $metadata_title || $metadata_caption ) {
                  echo '<figure>';
                }

                echo wp_get_attachment_image( $image_id, 'gallery-image' );

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
        </div>
      </div>

      <button class="slider_control slider_control--previous seq-prev">
        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-left-white.svg" />
      </button>

      <button class="slider_control slider_control--next seq-next">
        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-right-white.svg" />
      </button>
    </div>
  </div>

  <div class="slider_meta app_content-limiter">
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

<?php
  $post_content = $post->post_content;
  $has_content = $post_below_excerpt || $post_alt_title || $post_content;

  if($has_content) {
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
        echo apply_filters( 'the_content', $post_content );
      ?>
    </div>
  </div>

<?php } ?>
