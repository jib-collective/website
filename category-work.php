<?php get_header(); ?>

<div class="grid app_content-limiter">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="post">
      <?php
        if ( has_post_thumbnail() ) {
          the_post_thumbnail( 'large', array( "class" => "post_image" ));
        }
      ?>

      <div class="post_meta">
        <h2 class="post_headline">
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h2>

        <small>
          <time class="post_time">
          <?php the_time('F jS, Y'); ?>
          </time>

          <?php the_author_posts_link(); ?>
        </small>

        <div class="post_excerpt">
          <?php the_excerpt(); ?>
        </div>
      </div>
    </div>
  <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>