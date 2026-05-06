const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');

function compileSass() {
  return gulp.src('sass/style.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'compressed', silenceDeprecations: ['legacy-js-api', 'import'] }).on('error', sass.logError))
    .pipe(autoprefixer({ overrideBrowserslist: ['last 2 versions'], cascade: false }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./'));
}

exports.default = function () {
  gulp.watch(['sass/style.scss', 'sass/*/*', 'sass/*/*/*'], compileSass);
};
