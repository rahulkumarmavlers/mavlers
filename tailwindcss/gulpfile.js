const gulp = require('gulp');
const postcss = require('gulp-postcss');
const tailwindcss = require('tailwindcss');
const autoprefixer = require('autoprefixer');
const nested = require('postcss-nested');
const cssnano = require('cssnano');
const terser = require('gulp-terser');
const handlebars = require('gulp-compile-handlebars');
const rename = require('gulp-rename');

const paths = {
    css: './src/css/**/*.css',
    html: './*.html',
    handlebars: ['./templates/*.handlebars', './templates/**/*.handlebars'],
    srcFiles: './src/**/*.{css,js}'
};

const tailwindConfig = require('./tailwind.config.js');

// Task to compile CSS using PostCSS with Tailwind CSS
function buildStyles() {
    return gulp.src('./src/css/*.css')
        .pipe(postcss([
            nested,
            tailwindcss(tailwindConfig),
            autoprefixer,
            cssnano(),
        ]))
        .pipe(gulp.dest('./dist/css'));
}

// Task to minify JavaScript files
function minifyJs() {
    return gulp.src('./src/**/*.js')
        .pipe(terser())
        .pipe(gulp.dest('./dist'));
}

// Task to compile Handlebars templates into HTML
function compileHandlebars() {
    const templateData = {};

    return gulp.src('templates/pages/*.handlebars')
        .pipe(handlebars(templateData, {
            batch: ['templates/global', 'templates/partials'] 
        }))
        .pipe(rename({
            extname: '.html'
        }))
        .pipe(gulp.dest('./'));
}

// Watch task to monitor file changes and re-run tasks
function watchFiles() {
    gulp.watch(paths.css, gulp.series(buildStyles, minifyJs));
    gulp.watch(paths.html, gulp.series(buildStyles, minifyJs));
    gulp.watch(paths.handlebars, gulp.series(compileHandlebars));
    gulp.watch(paths.srcFiles, gulp.series(buildStyles, minifyJs));
}

// Default task to run build and watch tasks
exports.default = gulp.series(
    gulp.parallel(buildStyles, minifyJs, compileHandlebars),
    watchFiles
);
