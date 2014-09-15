<?php get_header(); ?>

<div class="page author author--full app_content-limiter">
  <?php
    $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
    $author_id = $author->ID;

    $userdata = get_user_meta( $author_id );
    $bio = $userdata['biography'];
    $image_id = get_field( $userdata['_image'][0], 'user_' . $author->ID );

    $posts = query_posts( array( 'author' => $author_id,
                                 'category' => 5 ) );
  ?>

  <h1 class="page_headline">
    <?php the_author() ?>
  </h1>

  <?php echo wp_get_attachment_image( $image_id,
                                      'thumbnail',
                                      1,
                                      array( 'class' => 'author_image' ) ); ?>

  <p class="author_data richtext">
    <?php echo $bio[0]; ?>
  </p>

  <h2 class="page_headline">Portfolio</h2>
  <?php
  $counter = 1;

  foreach ( $posts as $index => $post ) {
    $post_id = $post->ID;
    $acf_fields = get_field_objects( $post_id );
    $excerpt = get_field( 'excerpt', $post_id );
    $imagetype = 'category-image';
    ?>

    <div class="post">
      <a href="<?php echo get_permalink( $post_id ); ?>">
        <?php
          if( has_post_thumbnail( $post_id ) ) {
            echo '<div class="post_image-wrap">';
            echo get_the_post_thumbnail( $post_id, $imagetype, array( "class" => "post_image" ));
            echo '</div>';
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
      </a>
    </div>

    <?php

    $counter++;
  }
  ?>

</div>

<?php get_footer(); ?>