'use strict';
module.exports = function(grunt) {

  /**
   * CSS Files
   */
  var cssFileList = [
    'src/css/bootstrap.min.css',
    'src/css/github.css',
    'src/css/custom_styles.css',
  ];



  grunt.initConfig({
    cssmin: {
      minify: {
        expand: true,
        cwd: 'src/css/',
        src: ['*.css'],
        dest: 'assets/css/min/',
        ext: '.min.css'
      }
    },
    concat: {
      options: {
        stripBanners: true,
        banner: '/*! Markdown View Styles\n' +
                ' * @date <%= grunt.template.today("yyyy-mm-dd") %> */\n',
      },
      dist: {
        src: ['assets/css/min/*.css'],
        dest: 'assets/css/style.css',
      },
    },
    clean: ["assets/css/min/"]
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-clean');

  // Register tasks
  grunt.registerTask('default', [
    'cssmin',
    'concat',
    'clean'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};
