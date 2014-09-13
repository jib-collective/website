<?php get_header(); ?>

<?php
  $users = get_users();
?>

<div class="app_content-limiter">
  <h1 class="page_headline">Authors</h1>

  <?php
    foreach ( $users as $user ) {
      $userdata = get_user_meta( $user->ID );
      $bio = $userdata['biography'][0];
      $url = get_author_posts_url( $user->ID );
      ?>

      <h2>
        <a href="<?php echo $url; ?>">
          <?php echo $user->display_name; ?>
        </a>
      </h2>

      <p>
        <?php echo $bio; ?>
      </p>

      <?php
    }
  ?>
</div>

<?php get_footer(); ?>