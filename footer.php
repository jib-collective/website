        </div>
      </div>

    <footer class="footer">
      &copy; <?php echo date( "Y" ); ?> jib-collective
      <?php

        // find out menu ID
        $menu_slug = "header-social";
        $locations = get_nav_menu_locations();
        $MENU_ITEMS = wp_get_nav_menu_items( $locations[ $menu_slug ] );
        $TEMPLATE_DICRECTORY = get_bloginfo( 'template_directory' );

        echo '<ul class="footer_menu-social">';

        foreach ( $MENU_ITEMS as $index => $item ) {
          echo '<li class="menu-item">';

          $has_images = array( 'twitter', 'vimeo' );
          $index = strtolower( $item->title );

          if( in_array( $index, $has_images ) ) {
            $image = '<img src="' .
                         $TEMPLATE_DICRECTORY .
                         '/images/' .
                         $index .
                         '-white.svg"' .
                         'class="header_menu-social-image"' .
                      ' />';
          }

          echo '<a href="' . $item->url . '">';
            if( isset( $image ) ) {
              echo $image;
              echo '<span class="u-is-accessible-hidden">' .
                     $item->title .
                   '</span>';
            } else {
              echo $item->title;
            }
          echo '</a>';

          echo '</li>';
        }

        echo "</ul>";
      ?>
    </footer>

    <script src="<?php echo get_template_directory_uri(); ?>/js/dist/main.js"
            async
            defer></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-64228258-2', 'auto');
      ga('send', 'pageview');
    </script>

  </body>
</html>
