module.exports = function (grunt) {
    "use strict";

    var jsHeaderFiles = [];

    var jsFooterFiles = [
        'JavaScript/general.js',
        'JavaScript/main.js'
    ];

    //noinspection JSUnresolvedFunction
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        clean: {
            dist: {
                options: {
                    'force': true
                },
                src: ['Dist/Css/*', 'Dist/JavaScript/*']
            }
        },
        sass: {
            dev: {
                options: {
                    style: 'nested'
                },
                files: [{
                    expand: true,
                    src: ['Sass/main.scss'],
                    dest: '../Dist/Css',
                    flatten: true,
                    ext: '.css'
                }]
            },
            dist: {
                options: {sourcemap: 'none'},
                files: [{
                    expand: true,
                    src: ['Sass/main.scss'],
                    dest: '../Dist/Css',
                    flatten: true,
                    ext: '.css'
                }]
            }
        },
        concat: {
            jsHead: {
                src: jsHeaderFiles,
                dest: '../Dist/JavaScript/header.js'
            },
            jsFooter: {
                options: {
                    separator: ';\n'
                },
                src: jsFooterFiles,
                dest: '../Dist/JavaScript/footer.js'
            },

            cssHead: {
                src: [
                    'Css/fonts.css', 'Css/bootstrap.css',
                    '../Dist/Css/main.css'],
                dest: '../Dist/Css/header.css'
            }
        },
        postcss: {
            options: {
                map: true,
                processors: [
                    require('autoprefixer')({
                        browsers: [
                            // Use bootstrap browsers (but exclude IE8)
                            "Android 2.3",
                            "Android >= 4",
                            "Chrome >= 20",
                            "Firefox >= 24",
                            "Explorer >= 9",
                            "iOS >= 6",
                            "Opera >= 12",
                            "Safari >= 6"
                        ]
                    })
                ]
            },
            dist: {
                src: '../Dist/Css/*.css'
            }
        },
        uglify: {
            dist: {
                files: {
                    '../Dist/JavaScript/header.js': ['../Dist/JavaScript/header.js'],
                    '../Dist/JavaScript/footer.js': ['../Dist/JavaScript/footer.js']
                }
            },
            options: {
                report: 'min',
                mangle: false,
                screwIE8: true
            }
        },
        cssmin: {
            dist: {
                options: {
                    shorthandCompacting: true,
                    keepSpecialComments: 0
                },
                files: [{
                    expand: true,
                    cwd: '../Dist/Css',
                    src: ['*.css'],
                    dest: '../Dist/Css',
                    ext: '.css'
                }]
            }
        },
        copy: {
            dist: {
                files: [
                    {
                        expand: true,
                        src: ['Fonts/**', 'Images/**'],
                        dest: '../Dist/'
                    }
                ]
            }
        },
        watch: {
            css: {
                files: ['Css/**/*.css'],
                tasks: ['concat:cssHead']
            },
            sass: {
                files: ['Sass/**/*.scss'],
                tasks: ['sass:dev', 'concat:cssHead']
            },
            js: {
                files: ['JavaScript/**/*.js'],
                tasks: ['concat']
            },
            fonts: {
                files: ['Fonts/**'],
                tasks: ['copy']
            },
            img: {
                files: ['Images/**'],
                tasks: ['copy']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['clean', 'sass:dev', 'concat', 'copy']);
    grunt.registerTask('dist', ['clean', 'sass:dist', 'concat', 'uglify', 'postcss', 'cssmin', 'copy']);
};