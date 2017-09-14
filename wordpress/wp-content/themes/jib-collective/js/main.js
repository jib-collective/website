requirejs.config({
  baseUrl: '/js/',
  paths: {
    jquery: 'components/jquery/dist/jquery',
    modernizr: 'components/modernizr/modernizr',
    slick: 'components/slick.js/slick/slick',
    webfontloader: 'components/webfontloader/webfontloader',
  },
  shim: {
    'Modernizr': {
      exports: 'Modernizr',
    },

    'jquery': {
      exports: '$',
    },

    'webfontloader': {
      exports: 'WebFont',
    }
  },
});

require( [ 'webfontloader' ], function( WebFont ) {

  WebFont.load({
    classes: false,
    google: {
      families: [ 'Open+Sans:400,300:latin' ],
    }
  });

});

/* Check for Flexbox-Support and provide fallback Layout */
require( [ 'jquery', ], function( $ ) {
  $(function() {
    var $grid = $( '.grid' );

    if( !$grid.length ) {
      return;
    }

    require( [ 'modernizr', ], function() {
      var supportsFlexbox = Modernizr.flexbox && Modernizr.flexboxlegacy;

      if( !supportsFlexbox ) {
        require( [ 'utils/loadCSS', ], function( loadCSS ) {
          loadCSS( 'fallback-layout' );
        });
      }
    });
  });
});

/* Author Page */
require( [ 'jquery', ], function( $ ) {
  $(function() {
    var $pgpToggle = $( '.js--toggle-pgp' );

    $pgpToggle
      .on( 'click', function( e ) {
        e.preventDefault();

        $( this )
          .parent()
          .next( '.pgp' )
          .toggleClass( 'u-is-hidden' );
      });
  });
});

/* Gallery Page */
require( [ 'jquery', ], function( $ ) {
  $(function() {
    var $slider = $( '.slider_container' ),
        options = {
          adaptiveHeight: true,
          slidesToShow: 1,
          fade: true,
          infinite: true,
          speed: 200,
        };

    if( !$slider.length ) {
      return;
    }

    require( [ 'slick', ], function() {

      /* Init the Slider */
      $slider.slick( options );

      /* Custom Controls */
      $( '.slider_previous-button' )
        .on( 'click', function( e ) {
          e.preventDefault();
          $( '.slider_container' ).slick( 'prev' );
        });

      $( '.slider_next-button' )
        .on( 'click', function( e ) {
          e.preventDefault();
          $( '.slider_container' ).slick( 'next' );
        });

    });
  });
});

