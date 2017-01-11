'use strict';
const gulp = require('gulp');
const sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();
const image = require('gulp-image');

gulp.task('default', ['sass']);
gulp.task('watch', ['sass:watch']);

/*
 *
 * SASS
 *
 */
gulp.task('sass', function () {
	return gulp.src('resources/assets/sass/*.scss')
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(gulp.dest('public/css'));
});
gulp.task('sass:watch', function () {
	gulp.watch('resources/assets/sass/*.scss', ['sass']);
});

/*
 *
 * browsersync
 *
 */
gulp.task('sync', function() {
	browserSync.init({
		proxy: "hackernews.local"
	});
});

/*
 *
 * image
 *
 */
gulp.task('image', function () {
	gulp.src('resources/assets/img/*')
		.pipe(image())
		.pipe(gulp.dest('public/img'));
});