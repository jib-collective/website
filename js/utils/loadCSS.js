define(function() {
  var loadCSS = function( fragment ) {
    var link = document.createElement( 'link' );

    link.type = 'text/css';
    link.rel = 'stylesheet';
    link.href = '/css/' + fragment + '.css';
    document.getElementsByTagName( 'head' )[ 0 ].appendChild( link );
  };

  return loadCSS;
});
