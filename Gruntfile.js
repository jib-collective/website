module.exports = function ( grunt ) {
  require('load-grunt-tasks')( grunt );

  grunt.initConfig({
    less: {
      dev: {
        options: {
          paths: [ "less/" ]
        },
        files: {
          "style.css": "less/jib.less"
        }
      }
    },

    watch: {
      scripts: {
        files: [ 'less/*.less' ],
        tasks: [ 'less', 'concat' ],
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

