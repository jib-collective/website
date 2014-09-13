<?php get_header(); ?>

<?php

  $posts = query_posts('category=1');
  wp_reset_query();
?>

<div class="grid app_content-limiter">
  <?php
    /* show last featured post */
    foreach ( $posts as $post  ) {
      $post_id = $post->ID;
      $is_featured = false;
      $acf_fields = get_field_objects( $post_id );
      $excerpt = get_field( 'excerpt', $post_id );

      if( has_tag( 'featured', $post ) ) {
  ?>

    <div class="post post--featured">
      <?php
        if( has_post_thumbnail( $post_id ) ) {
          echo get_the_post_thumbnail( $post_id, 'category-image', array( "class" => "post_image" ));
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
        break;
      }
    }

    /* show non featured posts */
    foreach ( $posts as $post  ) {
      $post_id = $post->ID;
      $is_featured = false;
      $excerpt = get_field( 'excerpt', $post_id );

      if( !has_tag( 'featured', $post ) ) {
  ?>

    <div class="post">
      <?php
        if( has_post_thumbnail( $post_id ) ) {
          echo get_the_post_thumbnail( $post_id, 'category-image', array( "class" => "post_image" ));
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
      }
    }
  ?>
</div>

<?php get_footer(); ?>