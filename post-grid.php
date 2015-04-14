<?php
  $featured_posts_class = '';

  if( isset( $FEATURED_POSTS ) && $FEATURED_POSTS == true ) {
    $featured_posts_class = 'post-grid--featured';
  }
?>

<div class="grid post-grid <?php echo $featured_posts_class; ?>">
  <?php
    $counter = 1;

    foreach ( $POSTS as $index => $post ) {
      $post_id = $post->ID;
      $post_title = $post->post_title;
      $acf_fields = get_field_objects( $post_id );
      $post_excerpt = get_field( 'excerpt', $post_id );
      $post_url = get_permalink( $post_id );

      $post_thumbnail = get_the_post_thumbnail( $post_id,
                                                'featured-category-image',
                                                array(
                                                 'class' => 'post_image',
                                                )
                                              );
  ?>

    <div class="grid_column grid_column--4 post-grid_column--4">
      <div class="post">
        <a href="<?php echo $post_url ?>">
          <?php
            if( has_post_thumbnail( $post_id ) ) {
          ?>

            <div class="post_image-wrap">
              <?php echo $post_thumbnail; ?>
            </div>

          <?php
            }
          ?>

          <div class="post_meta">
            <h2 class="post_headline">
              <?php echo $post_title; ?>
            </h2>

            <div class="post_excerpt richtext">
              <?php echo $post_excerpt; ?>
            </div>
          </div>
        </a>
      </div>
    </div>

  <?php
      $counter++;
    }
  ?>
</div>