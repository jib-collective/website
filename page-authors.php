<?php get_header(); ?>

<div class="app_content-limiter">
  <ul class="authors">

  <?php
    $users = get_users();

    foreach ( $users as $user ) {
      $userdata = get_user_meta( $user->ID );
      $bio = $userdata['biography'][0];
      $url = get_author_posts_url( $user->ID );
      $image_id = get_field( $userdata['_image'][0], 'user_' . $user->ID );
      ?>

      <li class="author">
        <a class="author_link"
           href="<?php echo $url; ?>">
          <?php echo wp_get_attachment_image( $image_id,
                                              'author-portrait',
                                              1,
                                              array(
                                                'class' => 'author_image',
                                              )
                                            ); ?>

          <h2 class="author_title">
              <?php echo $user->display_name; ?>
          </h2>
        </a>

        <div class="author_bio">
          <div class="richtext">
            <?php echo apply_filters( 'the_content', $bio ); ?>
          </div>
        </div>
      </li>

      <?php
    }
  ?>

  </ul>
</div>

<?php get_footer(); ?>