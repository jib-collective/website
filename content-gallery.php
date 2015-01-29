<?php
  $post = get_post();
  $post_id = $post->ID;
  $post_title = $post->post_title;
  $images = get_field( 'images', $post_id );
?>

<h1 class="page_headline">
  <?php echo $post_title; ?>
</h1>

<div class="slider">
  <?php
    foreach( $images as $index => $image ) {
      ?>
      <div>
        <?php
          echo wp_get_attachment_image( $image['ID'], 'gallery-image' );
        ?>
      </div>
      <?php
    }
  ?>
</div>

<div class="richtext richtext--full-content">
  <?php
    echo apply_filters( 'the_content', $post->post_content );
  ?>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.3.7/slick.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.4.0/slick.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.slider').slick({
      fade: true,
      infinite: true,
      speed: 200,
    });
  })
</script>