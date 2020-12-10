module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
      options: {
        separator: ' ',
      },
      dist: {
        src: ['assets/css/style.css'],
        dest: 'assets/css/style.min.css',
      },
    },
    uglify: {
      build: {
        src: 'source/js/scripts.js',
        dest: 'assets/js/scripts.min.js',
      },
    },    
    sass: {
      dist: {
        options: {
          style: 'compressed'
        },        
        files: {
          'assets/css/style.css' : 'source/scss/style.scss'
        }
      }
    },
    autoprefixer: {
      dist: {
        options: {
          browsers: ['last 20 versions', 'ie 7', 'ie 8', 'ie 9']
        },        
        files: {
          'assets/css/style.css' : 'assets/css/style.css'
        },
      },
    },    
    watch: {
      js: {
        files: ['source/js/scripts.js'],
        tasks: ['uglify']
      },      
      css: {
        files: 'source/scss/style.scss',
        tasks: ['sass', 'autoprefixer', 'concat']
      },
    },    
   });

  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // Default task(s).
  grunt.registerTask('default',['watch']);
};
