<?php get_header(); ?>

<?php

  $posts = query_posts( array( 'tag__in' => array( 4 ),
                               'category__in' => array( 3 ) ) );

  $featured_positions = array( 1, 4, 8, 11 );

  wp_reset_query();
?>

<div class="grid app_content-limiter">
  <?php
  $counter = 1;

  foreach ( $posts as $index => $post ) {
    if( in_array( $counter, $featured_positions ) ) {
      $is_featured = true;
    } else {
      $is_featured = false;
    }

    var_dump( $is_featured );

    $post_id = $post->ID;
    $acf_fields = get_field_objects( $post_id );
    $excerpt = get_field( 'excerpt', $post_id );
    $imagetype = 'category-image';

    if( $is_featured ) {
      $imagetype = 'featured-' . $imagetype;
    }

    ?>

    <div class="post <?php if( $is_featured ) { echo 'post--featured'; } ?>">
      <?php
        if( has_post_thumbnail( $post_id ) ) {
          echo get_the_post_thumbnail( $post_id, $imagetype, array( "class" => "post_image" ));
        }
      ?>

      <div class="post_meta">
          <h2 class="post_headline">
            <?php echo $post->post_title; ?>
          </h2>

          <div class="post_excerpt richtext">
            <?php echo $excerpt; ?>
          </div>
        </div>
    </div>

    <?php

    $counter++;
  }
  ?>
</div>

<?php get_footer(); ?>