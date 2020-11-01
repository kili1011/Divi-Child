module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // Typescript
        ts: {
            default: {
                tsconfig: 'tsconfig.json',
            }
        },

        // Load Sass Files
        sass: {
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'build/child-theme.css': 'assets/scss/child-theme.scss'
                }
            } 
        },

        // Watcher config
        watch: {
            scripts: {
                files: ['**/*.ts'],
                tasks: ['ts'],
                options: {
                    spawn: false,
                },
            },
            css: {
                files: ['assets/scss/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false,
                }
            } 
        }
    });

    // Plug-Ins
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-connect-proxy');
    grunt.loadNpmTasks('grunt-ts');

    // Set Watcher to default task
    grunt.registerTask('default', ['ts', 'sass']);

};


