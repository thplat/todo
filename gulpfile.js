var gulp = require('gulp');
var sass  = require('gulp-sass');
var livereload = require('gulp-livereload');
var cssmin = require('gulp-minify-css');

gulp.task('build-css', function() {

	gulp.src('public/sass/base.scss')
		.pipe(sass())
		.pipe(cssmin())
		.pipe(gulp.dest('public/css'))
		.pipe(livereload());
});

gulp.task('watch', function(){

	var server = livereload();

	gulp.watch('public/sass/**/*.scss', ['build-css']);
	gulp.watch('app/views/**/*.php').on('change', function(file){
		server.changed(file.path);
	});

});


gulp.task('default', ['build-css', 'watch']);