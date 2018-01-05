var gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    vinylpaths = require('vinyl-paths'),
    cleancss = require('gulp-clean-css'),
    cmq = require('gulp-combine-mq'),
    prettify = require('gulp-jsbeautifier'),
    concatcss = require('gulp-concat-css'),
    uglify = require('gulp-uglify'),
    foreach = require('gulp-flatmap'),
    changed = require('gulp-changed'),
    vinylpaths = require('vinyl-paths'),
    del = require('del');

// CSS
gulp.task('styles', function(){
    return gulp.src('public/scss/*.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(autoprefixer('> 0%'))
        .pipe(cmq())
        .pipe(cleancss())
        .pipe(gulp.dest('temp/css'))
        .pipe(rename('widget.css'))
        .pipe(gulp.dest('public/css'))
        .pipe(notify({ message: 'Source styles task complete' }));
} );

// Vendor JS
gulp.task('scripts', function(){
    return gulp.src([
        'node_modules/owl.carousel/dist/owl.carousel.js',
        'public/js/sources/*.js'
    ])
    .pipe(foreach(function(stream, file){
        return stream
            .pipe(changed('temp/js'))
            .pipe(uglify())
            .pipe(rename({suffix: '.min'}))
            .pipe(gulp.dest('temp/js'))
    }))
    .pipe(gulp.dest('public/js'))
    .pipe(notify({ message: 'Scripts task complete' }));
});

// Clean temp folder
gulp.task('clean:temp', function(){
    return gulp.src('temp/*')
    .pipe(vinylpaths(del))
});

// Default task
gulp.task('default', ['clean:temp'], function() {
    gulp.start('styles', 'watch');
    gulp.start('scripts', 'watch');
});

// Watch
gulp.task('watch', function() {
    // Watch .scss files
    gulp.watch(['public/scss/*.scss', 'public/scss/**/*.scss'], ['styles']);
    gulp.watch(['public/js/sources/*.js'], ['scripts']);
});
