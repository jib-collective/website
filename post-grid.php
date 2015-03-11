<div class="grid post-grid">
  <?php
    $counter = 1;

    foreach ( $POSTS as $index => $post ) {
      $is_featured = true;

      if( isset( $FEATURED_POSITIONS ) ) {
        if( !in_array( $counter, $FEATURED_POSITIONS ) ) {
          $is_featured = false;
        }
      } else {
        $is_featured = false;
      }

      $post_id = $post->ID;
      $post_title = $post->post_title;
      $acf_fields = get_field_objects( $post_id );
      $post_excerpt = get_field( 'excerpt', $post_id );
      $imagetype = 'category-image';
      $column_type = '4';
      $post_url = get_permalink( $post_id );
      $featured_css_class = '';

      if( $is_featured ) {
        $imagetype = 'featured-' . $imagetype;
        $column_type = '8';
        $featured_css_class = 'post--featured';
      }

      $post_thumbnail = get_the_post_thumbnail( $post_id,
                                                $imagetype,
                                                array(
                                                 'class' => 'post_image',
                                                )
                                              );
  ?>

    <div class="grid_column grid_column--<?php echo $column_type; ?> post-grid_column--<?php echo $column_type; ?>">
      <div class="post <?php echo $featured_css_class; ?>">
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