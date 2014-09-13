<?php get_header(); ?>

<?php
  $users = get_users();
?>

<div class="app_content-limiter">
  <h1 class="page_headline">Authors</h1>

  <ul class="author_list">

  <?php
    foreach ( $users as $user ) {
      $userdata = get_user_meta( $user->ID );
      $bio = $userdata['biography'][0];
      $url = get_author_posts_url( $user->ID );
      $image_url = get_field( $userdata['_image'][0], 'user_' . $user->ID );
      ?>

      <li class="author">
        <img src="<?php echo $image_url; ?>" class="author_image" />

        <div class="author_data">
          <h2 class="author_title">
            <a href="<?php echo $url; ?>">
              <?php echo $user->display_name; ?>
            </a>
          </h2>

          <div class="richtext">
            <?php echo $bio; ?>
          </div>
        </div>
      </li>

      <?php
    }
  ?>

  </ul>
</div>

<?php get_footer(); ?>