const gulp = require('gulp');

/**
 * Task: gulp fontawesome
 */
gulp.task('fontawesome', function(){
    return gulp.src(['node_modules/@fortawesome/fontawesome-free/svgs/**/*.svg'])
        .pipe(gulp.dest('assets/dist/fontawesome/icons'));
});

/**
 * Task: gulp tabler
 */
gulp.task('tabler', function(){
    return gulp.src(['node_modules/@tabler/icons/icons/**/*.svg'])
        .pipe(gulp.dest('assets/dist/tabler/icons'));
});

/**
 * Task: gulp bootstrap
 */
gulp.task('bootstrap', function(){
    return gulp.src(['node_modules/bootstrap-icons/icons/**/*.svg'])
        .pipe(gulp.dest('assets/dist/bootstrap/icons'));
});

/**
 * Task: gulp default
 */
gulp.task('default', gulp.series(
    'fontawesome',
    'bootstrap',
    'tabler'
));
