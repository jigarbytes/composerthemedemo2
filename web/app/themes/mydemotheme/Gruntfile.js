module.exports = function(grunt) {

	//project configurations
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),	
		cssmin: {
			target : {
				src : ["assets/css/style.css"],
				dest : "assets/css/style.min.css"
			}

		},
		uglify: {
			options: {
				mangle: false
			},
			my_target: {
				files: {
					'output.min.js': ['assets/js/*']
				}
			}
		},
		makepot: {
			target: {
				options: {
					domainPath: '/languages/',             // Where to save the POT file.
					mainFile: 'style.css',                 // Main project file.
					potFilename: 'wpdemo.pot',              // Name of the POT file.
					type: 'wpdemo',                      // Type of project (wp-plugin or wp-theme).
					processPot: function( pot, options ) {
						pot.headers['report-msgid-bugs-to'] = 'http://ulrich.pogson.ch/contact-me';
						pot.headers['plural-forms'] = 'nplurals=2; plural=n != 1;';
						pot.headers['last-translator'] = 'Ulrich Pogson <ulrich@pogson.ch>\n';
						pot.headers['language-team'] = 'Ulrich Pogson <ulrich@pogson.ch>\n';
						pot.headers['x-poedit-basepath'] = '.\n';
						pot.headers['x-poedit-language'] = 'English\n';
						pot.headers['x-poedit-country'] = 'UNITED STATES\n';
						pot.headers['x-poedit-sourcecharset'] = 'utf-8\n';
						pot.headers['x-poedit-keywordslist'] = '__;_e;_x;esc_html_e;esc_html__;esc_attr_e;esc_attr__;_ex:1,2c;_nx:4c,1,2;_nx_noop:4c,1,2;_x:1,2c;_n:1,2;_n_noop:1,2;__ngettext_noop:1,2;_c,_nc:4c,1,2;\n';
						pot.headers['x-textdomain-support'] = 'yes\n';
						return pot;
					}
				}
			}
		},
	
		/*exec: {
			update_po_tx: { // Update Transifex translation - grunt exec:update_po_tx
				cmd: 'tx pull -a --minimum-perc=100'
			},
			update_po_wti: { // Update WebTranslateIt translation - grunt exec:update_po_wti
				cmd: 'wti pull',
				cwd: 'languages/',
			}
		},*/
	
		po2mo: {
			files: {
				src: 'languages/*.po',
				expand: true,
			},
		}
		
	});

	//load cssmin plugin
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	
	grunt.loadNpmTasks('grunt-exec');
	grunt.loadNpmTasks('grunt-po2mo');
	grunt.loadNpmTasks('grunt-wp-i18n');
	grunt.loadNpmTasks('load-grunt-tasks');
	
	//create default task
	grunt.registerTask("default", ["cssmin","uglify",'makepot',  'po2mo' ]);
};