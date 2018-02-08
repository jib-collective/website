module.exports = function ( grunt ) {
  require( 'load-grunt-tasks' )( grunt );

  grunt.initConfig({
    less: {
      dev: {
        options: {
          paths: [ 'less/' ]
        },
        files: {
          'css/dev/style.css': 'less/jib.less',
          'css/fallback-layout.css': 'less/fallback-layout.less',
        }
      }
    },

    concat: {
      dev: {
        src: [ 'js/components/normalize.css/normalize.css',
               'css/dev/style.css' ],
        dest: 'style.css',
      },
    },
  });

  grunt.registerTask('compile', [ 'less',
                                  'concat', ]);
};

