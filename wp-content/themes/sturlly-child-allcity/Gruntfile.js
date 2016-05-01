// Set up Javascripts
var childBase = 'assets/';
var parentBase = '../sturlly/assets/';
var scripts = [
    // Leave jQuery in markup so it can be cached
    // parentBase + '../../../wp-includes/js/jquery/jquery.js',
    // parentBase + '../../../wp-includes/js/jquery/jquery-migrate.js',
    // parentBase + '../../../wp-includes/js/jquery/jquery-ui-core.js',

    // Files included in one line below, left here for reference.
    // parentBase + 'js/loader.min.js',
    // parentBase + 'js/preloader.js',
    // parentBase + 'js/jquery.easing.1.3.js',
    // parentBase + 'js/hover.min.js',
    parentBase + 'js/parallel.min.js',
    // parentBase + 'js/smooth-scroll.js',
    parentBase + 'js/matchMedia.js',
    parentBase + 'js/custom.js',
    parentBase + 'js/conter.js',
    parentBase + 'js/bootstrap-custom.js',
    parentBase + 'js/jquery.nav.js',
    parentBase + 'js/imagesloaded.pkgd.min.js',
    // parentBase + 'js/custom-scrollbar.min.js',
    parentBase + 'js/classie.js',
    parentBase + 'js/portfolio.js',
    parentBase + 'js/jquery.fitvids.js',
    parentBase + 'js/jquery.prettyPhoto.js',
    // parentBase + 'js/map.js',
    parentBase + 'js/counter.js',
    parentBase + 'js/coming-soon.js',
    parentBase + 'js/all.js',
    parentBase + 'js/idangerous.swiper.min.js',
    parentBase + 'js/isotope.pkgd.min.js',
    parentBase + 'js/jquery.fancybox.pack.js',

    // parentBase + 'js/*.js',

    childBase + 'js/vendor/clipboard.js',
    
    // childBase + '../node_modules/photoswipe/dist/photoswipe.js',
    // childBase + '../node_modules/photoswipe/dist/photoswipe-ui-default.js',
    
    childBase + 'js/script.js'
];

// our wrapper function (required by grunt and its plugins)
// all configuration goes inside this function
module.exports = function(grunt) {

  // ===========================================================================
  // CONFIGURE GRUNT ===========================================================
  // ===========================================================================
  grunt.initConfig({

    // get the configuration info from package.json ----------------------------
    // this way we can use things like name and version (pkg.name)
    pkg: grunt.file.readJSON('package.json'),

    // all of our configuration will go here

    // configure uglify to minify js files -------------------------------------
    uglify: {
      prod: {
        options: {
          banner: '/*\n <%= pkg.name %> PROD <%= grunt.template.today("yyyy-mm-dd hh:mm:ss") %> \n*/\n',
          sourceMap: false,
          beautify: false,
          mangle: false
        },
        files: {
          'assets/js/script.min.js': scripts
        }
      },
      dev: {
        options: {
          banner: '/*\n <%= pkg.name %> DEV <%= grunt.template.today("yyyy-mm-dd hh:mm:ss") %> \n*/\n',
          sourceMap: true,
          beautify: true,
          mangle: false
        },
        files: {
          'assets/js/script.min.js': scripts
        }
      }
    },

    // configure sass to process sass files into css -------------------------------------
    sass: {
      dist: {
        options: {
          style: 'expanded'
        },
        files: {
          'assets/css/style.css': 'assets/css/style-allcity.scss'
        }
      }
    },

    // configure cssmin to minify css files ------------------------------------
    cssmin: {
      options: {
        banner: '/*\n <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> \n*/\n'
      },
      build: {
        files: {
          'assets/css/style.min.css': 'assets/css/style.css'
        }
      }
    },

    // configure watch tasks for sass/css/js ------------------------------------
    watch: {
      sass: { 
        files: ['assets/css/*.scss', 'assets/css/foundation/*', parentBase + 'scss/*.scss'], 
        tasks: ['sass','cssmin'] 
      },
      scripts: { 
        files: ['assets/js/*.js', parentBase + 'js/*.js'], 
        tasks: ['uglify:dev'] 
      },
      grunt: {
        files: ['Gruntfile.js'],
        tasks: ['default']
      }
    }
  });


  // ============= // CREATE TASKS ========== //
  grunt.registerTask('default', ['uglify:dev', 'sass', 'cssmin', 'watch']);
  grunt.registerTask('build', ['uglify:prod', 'sass', 'cssmin']);

  // ===========================================================================
  // LOAD GRUNT PLUGINS ========================================================
  // ===========================================================================
  // we can only load these if they are in our package.json
  // make sure you have run npm install so our app can find these
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-sass');
};