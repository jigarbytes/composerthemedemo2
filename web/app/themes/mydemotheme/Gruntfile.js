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
		}
		
	});

	//load cssmin plugin
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-uglify');


	//create default task
	grunt.registerTask("default", ["cssmin","uglify"]);
};