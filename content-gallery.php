<?php
  $post = get_post();
  $post_id = $post->ID;
  $post_title = $post->post_title;
  $images = get_field( 'images', $post_id );
?>

<div class="slider_external-control">
  <button class="slider_previous-button">
    <img src="<?php bloginfo( 'template_directory' ); ?>/images/arrow-left.svg"> Previous </button>

  <button class="slider_next-button">
    Next <img src="<?php bloginfo( 'template_directory' ); ?>/images/arrow-right.svg"></button>
</div>

<div class="slider">


  <div class="slider_container">
    <?php
      foreach( $images as $index => $image ) {
    ?>
      <div>
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

<link rel="stylesheet"
      type="text/css"
      href="<?php bloginfo( 'template_directory'); ?>/js/components/slick.js/slick/slick.css" />

<link rel="stylesheet"
     type="text/css"
     href="<?php bloginfo( 'template_directory'); ?>/js/components/slick.js/slick/slick-theme.css" />
