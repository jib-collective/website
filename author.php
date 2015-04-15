<?php get_header(); ?>

<h1 class="page_headline">
  <?php the_author(); ?>
</h1>

<div class="page author author--full">
  <?php
    $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
    $author_id = $author->ID;

    $userdata = get_user_meta( $author_id );
    $bio = $userdata[ 'biography' ];

    $image_id = get_field( $userdata['_image'][0], 'user_' . $author_id );
    $twitter = get_field( 'twitter', 'user_' . $author_id );
    $facebook = get_field( 'facebook', 'user_' . $author_id );
    $tumblr = get_field( 'tumblr', 'user_' . $author_id );
    $vimeo = get_field( 'vimeo', 'user_' . $author_id );
    $skype = get_field( 'skype', 'user_' . $author_id );

    $telephone = get_field( 'telephone', 'user_' . $author_id );
    $email = get_field( 'publicemail', 'user_' . $author_id );
    $pgp = get_field( 'pgp-key', 'user_' . $author_id );

     $author_query = new WP_Query(
       array(
         'post_type' => 'post',
         'post_status' => 'publish',
         'post_category' => 5,
         'author_name' => $userdata['nickname'][0],
         'posts_per_page' => -1,
       )
     );

     $POSTS = $author_query->posts;
  ?>

  <?php echo wp_get_attachment_image( $image_id,
                                      'author-portrait',
                                      1,
                                      array(
                                        'class' => 'author_image',
                                      )
                                    ); ?>

  <div class="author_bio">
    <div class="richtext">
      <?php echo apply_filters( 'the_content', $bio[0] ); ?>
    </div>

    <h2 class="u-is-accessible-hidden">Contact</h2>
    <ul class="author_contact">
      <?php if( $email ) { ?>
        <li class="author_contact-item--block">
          <span>Email: </span>
          <a href="mailto: <?php echo $email; ?>">
            <?php echo $email; ?>
          </a>

        <?php if( $pgp ) { ?>
          <small>
            <a href="#" class="js--toggle-pgp">PGP-Key</a>
          </small>
          <pre class="pgp u-is-hidden"><?php echo $pgp; ?></pre>
        <?php } ?>

        </li>
      <?php } ?>

      <?php if( $telephone ) { ?>
        <li class="author_contact-item--block author_contact-item--margin-bottom">
          <span>Telephone: </span>
          <a href="tel: <?php echo $telephone; ?>">
            <?php echo $telephone; ?>
          </a>
        </li>
      <?php } ?>

      <?php if( $twitter ) { ?>
        <li class="author_contact-item">
          <a href="http://twitter.com/<?php echo $twitter; ?>">
            <img class="author_service-icon"
                 src="<?php bloginfo( 'template_directory' ); ?>/images/twitter.svg" />
            <span class="author_contact-domain u-is-accessible-hidden">twitter.com/</span><span class="u-is-accessible-hidden"><?php echo $twitter; ?></span>
          </a>
        </li>
      <?php } ?>

      <?php if( $facebook ) { ?>
        <li class="author_contact-item">
          <a href="http://facebook.com/<?php echo $facebook; ?>">
            <img class="author_service-icon"
                 src="<?php bloginfo( 'template_directory' ); ?>/images/facebook.svg" />
            <span class="author_contact-domain u-is-accessible-hidden">facebook.com/</span><span class="u-is-accessible-hidden"><?php echo $facebook; ?></span>
          </a>
        </li>
      <?php } ?>

      <?php if( $skype ) { ?>
        <li class="author_contact-item">
          <a href="skype:<?php echo $skype; ?>">
            <img class="author_service-icon"
                 src="<?php bloginfo( 'template_directory' ); ?>/images/skype.svg" />
            <span class="u-is-accessible-hidden"><?php echo $skype; ?></span>
          </a>
        </li>
      <?php } ?>

      <?php if( $tumblr ) { ?>
        <li class="author_contact-item">
          <a href="http://<?php echo $tumblr; ?>.tumblr.com">
            <img class="author_service-icon"
                 src="<?php bloginfo( 'template_directory' ); ?>/images/tumblr.svg" />
            <span class="u-is-accessible-hidden"><?php echo $tumblr; ?></span><span class="author_contact-domain u-is-accessible-hidden">.tumblr.com</span>
          </a>
        </li>
      <?php } ?>

      <?php if( $vimeo ) { ?>
        <li class="author_contact-item">
          <a href="http://vimeo.com/<?php echo $vimeo; ?>">
            <img class="author_service-icon"
                 src="<?php bloginfo( 'template_directory' ); ?>/images/vimeo.svg" />
            <span class="author_contact-domain u-is-accessible-hidden">vimeo.com/</span><span class="u-is-accessible-hidden"><?php echo $vimeo; ?></span>
          </a>
        </li>
      <?php } ?>

    </ul>
  </div>

  <?php if( $posts ) { ?>
    <h2 class="author_block-headline">Portfolio</h2>
  <?php } ?>

  <?php include( locate_template( 'post-grid.php' ) ); ?>

</div>

<?php get_footer(); ?>