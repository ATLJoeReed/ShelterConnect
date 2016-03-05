var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

gulp.task('browserSync', function() {
  browserSync.init({
    server: {
      baseDir: 'app'
    },
  });
});

gulp.task('styles', function() {
    return gulp.src('app/sass/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./app/css/'))
        .pipe(browserSync.reload({
          stream: true
        }));
});

//Watch task
gulp.task('default', ['browserSync'],function() {
    gulp.watch('app/sass/**/*.scss',['styles']);
});
