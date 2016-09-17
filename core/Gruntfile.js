/**
 * Watch test files and run PHPUnit automatically
 * @param grunt
 */
module.exports = function(grunt) {
  grunt.loadNpmTasks('grunt-phpunit');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.initConfig({
    phpunit: {
      classes: {
        dir: 'tests/'
      },
      options: {
        bin: 'vendor/bin/phpunit',
        bootstrap: './bootstrap.php',
        colors: true
      }
    },
    watch: {
      files: ['tests/**/*.php', 'lib/**/*.php'],
      tasks: ['phpunit']
    }
  });
  grunt.registerTask('default', ['watch']);
};
