<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="post post--featured">

  <h2 class="post_headline">
    <a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
    </a>
  </h2>

  <small class="post_meta">
    <?php the_time('F jS, Y'); ?> -
    <?php the_author_posts_link(); ?>
  </small>

  <div class="post_content">
    <?php the_excerpt(); ?>
  </div>

  </div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>