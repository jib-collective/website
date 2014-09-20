<?php get_header(); ?>

<div class="page author author--full app_content-limiter">
  <?php
    $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
    $author_id = $author->ID;

    $userdata = get_user_meta( $author_id );
    $bio = $userdata['biography'];

    $image_id = get_field( $userdata['_image'][0], 'user_' . $author->ID );
    $twitter = get_field( 'twitter', 'user_' . $author->ID );
    $facebook = get_field( 'facebook', 'user_' . $author->ID );
    $tumblr = get_field( 'tumblr', 'user_' . $author->ID );
    $vimeo = get_field( 'vimeo', 'user_' . $author->ID );
    $skype = get_field( 'skype', 'user_' . $author->ID );

    $telephone = get_field( 'telephone', 'user_' . $author->ID );
    $email = get_field( 'publicemail', 'user_' . $author->ID );
    $pgp = get_field( 'pgp-key', 'user_' . $author->ID );

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

  <div class="author_data">
    <div class="author_bio richtext">
      <?php echo apply_filters( 'the_content', $bio[0] ); ?>
    </div>

    <h2>Contact</h2>
    <ul class="author_contact">
      <?php if( $email ) { ?>
        <li class="">
          <span>Email: </span>
          <a href="mailto: <?php echo $email; ?>">
            <?php echo $email; ?>
          </a>

        <?php if( $pgp ) { ?>
          <small>
            <a href="#">PGP-Key</a>
          </small>
          <pre class="pgp u-is-hidden"><?php echo $pgp; ?></pre>
        <?php } ?>

        </li>
      <?php } ?>

      <?php if( $telephone ) { ?>
        <li class="">
          <span>Telephone: </span>
          <a href="tel: <?php echo $telephone; ?>">
            <?php echo $telephone; ?>
          </a>
        </li>
      <?php } ?>

      <?php if( $twitter ) { ?>
        <li class="author_contact-margin-top">
          <span>Twitter: </span>
          <a href="http://twitter.com/<?php echo $twitter; ?>">
            <?php echo $twitter; ?>
          </a>
        </li>
      <?php } ?>

      <?php if( $facebook ) { ?>
        <li class="">
          <span>Facebook: </span>
          <a href="http://facebook.com/<?php echo $facebook; ?>">
            <?php echo $facebook; ?>
          </a>
        </li>
      <?php } ?>

      <?php if( $skype ) { ?>
        <li class="">
          <span>Skype: </span>
          
          <a href="skype:<?php echo $skype; ?>">
            <?php echo $skype; ?>
          </a>
        </li>
      <?php } ?>

      <?php if( $tumblr ) { ?>
        <li class="">
          <span>Tumblr: </span>
          <a href="http://<?php echo $tumblr; ?>.tumblr.com">
            <?php echo $tumblr; ?>
          </a>
        </li>
      <?php } ?>

      <?php if( $vimeo ) { ?>
        <li class="">
          <span>Vimeo: </span>
          <a href="http://vimeo.com/<?php echo $vimeo; ?>">
            <?php echo $vimeo; ?>
          </a>
        </li>
      <?php } ?>

    </ul>
  </div>

  <<?php if( $posts ) { ?>
    <h2 class="page_headline">Portfolio</h2>
  <?php } ?>

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