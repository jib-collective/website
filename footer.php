      </div>
    </div>

    <footer class="footer">
      <div class="footer_menu-social">
        &copy; <?php echo date("Y"); ?>
        <?php wp_nav_menu(array( "theme_location" => "header-social",
                                 "container" => "", )); ?>
      </div>
    </footer>

    <script type="text/javascript">
      WebFontConfig = {
        google: { families: [ 'Open+Sans:400,300:latin' ] }
      };
      (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
          '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();
    </script>

    <script src="<?php bloginfo( 'template_url' ); ?>/js/dist/main.js"
            async
            defer></script>

  </body>
</html>