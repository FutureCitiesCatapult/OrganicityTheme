module.exports = function( grunt ) {
	'use strict';

	// Load all grunt tasks
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	// Project configuration
	grunt.initConfig( {
		pkg: grunt.file.readJSON( 'package.json' ),
		concat: {
			organicity: {
				options: {
					stripBanners: true,
					banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
						' * <%= pkg.homepage %>\n' +
						' * Copyright (c) <%= grunt.template.today("yyyy") %> Future Cities Catapult' +
						' */\n'
				},
				src: [
					'<%= pkg.src %>/js/organicity.js',
				],
				dest: '<%= pkg.dist %>/js/organicity.js'
			},
			carousel: {
				src: [
					'<%= pkg.src %>/js/owl.carousel.js',
				],
				dest: '<%= pkg.dist %>/js/owl.carousel.js'
			}

		},
		jshint: {
			browser: {
				all: [
					'<%= pkg.src %>/js/*.js'
				],
				options: {
					jshintrc: '.jshintrc'
				}
			},
			grunt: {
				all: [
					'Gruntfile.js'
				],
				options: {
					jshintrc: '.gruntjshintrc'
				}
			}
		},
		uglify: {
			organicity: {
				files: {
					'<%= pkg.dist %>/js/organicity.min.js': ['<%= pkg.dist %>/js/organicity.js'],
				},
				options: {
					banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
						' * <%= pkg.homepage %>\n' +
						' * Copyright (c) <%= grunt.template.today("yyyy") %> Future Cities Catapult' +
						' */\n',
					mangle: {
						except: ['jQuery']
					}
				}
			},
			carousel: {
				files: {
					'<%= pkg.dist %>/js/owl.carousel.min.js': ['<%= pkg.dist %>/js/owl.carousel.js'],
				},
				options: {
					preserveComments: function(_, comment) {
						return comment.value.indexOf('Copyright') !== -1;
					}
				}
			}
		},

		sass:   {
			all: {
				files: {
					'<%= pkg.dist %>/style.css': '<%= pkg.src %>/styles/organicity.scss'
				},
				options: {
					sourcemap: 'auto'
				}
			}
		},

		cssmin: {
			options: {
				banner: '/**\n' +
								' * Theme Name:  Organicity\n' +
								' * Theme URI:   http://www.organicity.eu\n' +
								' * Description: WordPress theme for the Organicity website.\n' +
								' * Author:      Future Cities Catapult\n' +
								' * Version:     <%= pkg.version %>\n' +
								' * Copyright (c) <%= grunt.template.today("yyyy") %> Future Cities Catapult\n' +
								' */'
			},
			minify: {
				expand: true,

				cwd: '<%= pkg.dist %>/',
				src: ['style.css'],

				dest: '<%= pkg.dist %>/',
				ext: '.min.css'
			}
		},

		watch:  {

			sass: {
				files: ['<%= pkg.src %>/styles/organicity.scss'],
				tasks: ['sass', 'cssmin'],
				options: {
					debounceDelay: 500
				}
			},

			scripts: {
				files: ['<%= pkg.src %>/js/**/*.js'],
				tasks: ['jshint', 'concat', 'uglify'],
				options: {
					debounceDelay: 500
				}
			},

			livereload: {
	      options: { livereload: true },
	      files: ['<%= pkg.dist %>/style.css', '<%= pkg.dist %>/js/*.js', '<%= pkg.dist %>/*.php']
    	}
		}
	} );

	// Default task.

	grunt.registerTask( 'default', ['jshint', 'concat', 'uglify', 'sass', 'cssmin'] );


	grunt.util.linefeed = '\n';
};
