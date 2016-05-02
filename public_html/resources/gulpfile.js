var gulp = require('gulp');
var gutil = require('gulp-util');
var bower = require('bower');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var minifyCss = require('gulp-minify-css');
var rename = require('gulp-rename');
var sh = require('shelljs');

gulp.task('default', ['sass']);

gulp.task('sass', function(done) {
  gulp.src('./scss/infocus.scss')
    .pipe(sass({includePaths: ['./scss/']}))
    .on('error', sass.logError)
    .pipe(minifyCss({
      keepSpecialComments: 0
    }))
    .pipe(rename({ extname: '.min.css' }))
    .pipe(gulp.dest('css/'))
    .on('end', done);
});

gulp.task('foundation-js', function() {
  return gulp.src('./node_modules/foundation/js/foundation/foundation.js')
    .pipe(concat('foundation.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('js/vendor'))
    .on('error', gutil.log)
});

gulp.task('watch', function() {
  gulp.watch('./scss/*.scss', ['sass']);
});
