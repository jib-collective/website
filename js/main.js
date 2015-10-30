requirejs.config({
  baseUrl: '/js/',
  paths: {
    jquery: 'components/jquery/dist/jquery',
    modernizr: 'components/modernizr/modernizr',
    imagesLoaded: 'components/imagesloaded/imagesloaded.pkgd.min',
    Hammer: 'components/hammerjs/hammer.min',
    sequence: 'components/sequencejs/src/sequence',
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
      families: [
        'Open+Sans:800,400,300:latin',
      ],
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
require( [ 'jquery', 'sequence' ], function( $, sequence ) {
  $(function() {
    var $slider = $('.slider_container');

    var element = $slider.get(0);

    var options = {
      autoPlay: false,
    };

    var mySequence = sequence(element, options);

    mySequence.currentPhaseEnded = function() {
      console.log(arguments);
    };
  });
});

