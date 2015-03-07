<?php
  $post = get_post();
  $post_id = $post->ID;
  $post_title = $post->post_title;
  $images = get_field( 'images', $post_id );
?>

<div class="slider">
  <div class="slider_container">
    <?php
      foreach( $images as $index => $image ) {
    ?>
      <div>
        <?php
          $image_id = $image[ 'ID' ];

          echo wp_get_attachment_image( $image_id, 'gallery-image' );
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

<div class="richtext richtext--full-content">
  <?php
    echo apply_filters( 'the_content', $post->post_content );
  ?>
</div>

<script type="text/javascript"
        src="https://code.jquery.com/jquery-1.11.0.min.js"></script>

<link rel="stylesheet"
      type="text/css"
      href="<?php bloginfo( 'template_directory'); ?>/bower_components/slick.js/slick/slick.css" />

<link rel="stylesheet"
     type="text/css"
     href="<?php bloginfo( 'template_directory'); ?>/bower_components/slick.js/slick/slick-theme.css" />

<script type="text/javascript"
        src="<?php bloginfo( 'template_directory'); ?>/bower_components/slick.js/slick/slick.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $( '.slider_container' ).slick({
      adaptiveHeight: true,
      slidesToShow: 1,
      fade: true,
      infinite: true,
      speed: 200,
    });
  })
</script>