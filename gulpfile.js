var gulp    = require('gulp'),
    gutil = require('gulp-util');
    plugins = require('gulp-load-plugins')();




gulp.task('default', ['watch']);


gulp.task('squish-jquery', function() {
  return gulp.src('assets/js/libs/**/*.js')
    .pipe(plugins.uglify())
    .pipe(plugins.concat('jquery.plugins.min.js'))
    .pipe(gulp.dest('build'));
});


gulp.task('build-js', function() {
  return gulp.src('assets/js/*.js')
    .pipe(plugins.jshint())
    .pipe(plugins.jshint.reporter('jshint-stylish'))
    .pipe(plugins.uglify())
    .pipe(plugins.concat('scripts.min.js'))
    .pipe(gulp.dest('build'));
});


gulp.task('build-css', function() {
    return gulp.src('assets/less/*.less')
        .pipe(plugins.plumber())
        .pipe(plugins.less())
        .on('error', function (err) {
            gutil.log(err);
            this.emit('end');
        })
        // .pipe(plugins.cssmin())
        .pipe(plugins.autoprefixer(
            {
                browsers: [
                    '> 1%',
                    'last 2 versions',
                    'firefox >= 4',
                    'safari 7',
                    'safari 8',
                    'IE 8',
                    'IE 9',
                    'IE 10',
                    'IE 11'
                ],
                cascade: false
            }
        ))
        .pipe(gulp.dest('build')).on('error', gutil.log)
        .pipe(plugins.livereload());

});


gulp.task('watch', function() {
    plugins.livereload.listen();
    gulp.watch('assets/js/libs/**/*.js', ['squish-jquery']);
    gulp.watch('assets/js/*.js', ['build-js']);
    gulp.watch('assets/less/**/*.less', ['build-css']);
});