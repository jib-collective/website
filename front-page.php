<?php get_header(); ?>

<div class="grid app_content-limiter">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php
      $featured_class = "";
      $is_featured = false;

      if( has_tag( 'featured' ) ) {
        $featured_class = "post--featured";
        $is_featured = true;
      }
    ?>

    <div class="post <?php echo $featured_class ?>">
      <a href="<?php the_permalink(); ?>">
        <?php
          if ( has_post_thumbnail() ) {
            if( $is_featured ) {
              the_post_thumbnail( 'featured-category-image', array( "class" => "post_image" ));
            } else {
              the_post_thumbnail( 'category-image', array( "class" => "post_image" ));
            }
          }
        ?>

        <div class="post_meta">
          <h2 class="post_headline">
            <?php the_title(); ?>
          </h2>

          <div class="post_excerpt richtext">
            <?php the_excerpt(); ?>
          </div>
        </div>
      </a>
    </div>
  <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>