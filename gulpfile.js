const gulp = require('gulp');
const babel = require('gulp-babel');

gulp.task('transpilejs', function () {
    return gulp.src('client/src/*.js')
        .pipe(babel({
            presets: [
                '@babel/preset-env',
                'babel-preset-minify'
            ]
        }))
        .pipe(gulp.dest('client/dist'))
});

gulp.task('watch', function () {
    gulp.watch('client/src/*.js', gulp.series(['transpilejs']));
});
