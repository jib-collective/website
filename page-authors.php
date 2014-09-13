<?php get_header(); ?>

<?php
  $users = get_users();
?>

<?php
  foreach ( $users as $user ) {
    $userdata = get_user_meta( $user->ID );
    $bio = $userdata['biography'][0];

    ?>

    <h2><?php echo $user->display_name; ?></h2>
    <p><?php echo $bio; ?></p>

    <?php
  }
?>

<?php get_footer(); ?>