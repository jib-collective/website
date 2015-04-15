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

    requirejs: {
      dist: {
        options: {
          baseUrl: 'js',
          name: 'main',
          mainConfigFile: 'js/main.js',
          out: 'js/dist/main.js',
          optimize: 'uglify2',
          paths: {
            requireLib: 'components/requirejs/require',
          },
          include: [
            'requireLib',
          ],
          uglify2: {
            output: {
              beautify: false,
            },
          }
        },
      },
    },

    watch: {
      less: {
        files: [ 'less/**/*.less' ],
        tasks: [ 'less', 'concat', ],
        options: {
          spawn: false,
        },
      },

      js: {
        files: [ 'js/*.js' ],
        tasks: [ 'requirejs', ],
        options: {
          spawn: false,
        },
      },
    },

    concat: {
      dev: {
        src: [ 'js/components/normalize.css/normalize.css',
               'css/dev/style.css' ],
        dest: 'css/style.css',
      },
    },
  });

  grunt.registerTask('compile', [ 'less',
                                  'concat',
                                  'requirejs', ]);
};

