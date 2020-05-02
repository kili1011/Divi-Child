module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // Concatenate JS Files
        concat: {
            dist: {
                src: [
                    'js/global.js'  // This specific file
                ],
                dest: 'js/build/production.js',
            }
        },

        // Minify JS Files
        uglify: {
            build: {
                src: 'js/build/production.js',
                dest: 'js/build/production.min.js'
            }
        },

        // Load Sass Files
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'css/child-theme.css': 'sass/child-theme.scss'
                }
            } 
        },

        // Watcher config
        watch: {
            scripts: {
                files: ['js/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false,
                },
            },
            css: {
                files: ['sass/child-theme.scss'], 
                tasks: ['sass'],
                options: {
                    spawn: false,
                }
            } 
        }
    });

    // Plug-Ins
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-connect-proxy');


    // Set Watcher to default task
    grunt.registerTask('default', ['concat', 'uglify', 'sass']);

};


