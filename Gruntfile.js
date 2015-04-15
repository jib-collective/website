module.exports = function ( grunt ) {
  require('load-grunt-tasks')( grunt );

  grunt.initConfig({
    less: {
      dev: {
        options: {
          paths: [ 'less/' ]
        },
        files: {
          'style.css': 'less/jib.less',
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
        src: [ 'bower_components/normalize.css/normalize.css',
               'style.css' ],
        dest: 'style.css',
      },
    },
  });

  grunt.registerTask('compile', [ 'less',
                                  'concat' ]);
};

