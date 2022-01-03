'use strict'

/* = Gulp
-------------------------------------------------------------- */
// include package
const { series, parallel, src, dest, watch } = require('gulp')
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer')
const uglify = require('gulp-uglify')
const sourcemaps = require('gulp-sourcemaps')
const rename = require('gulp-rename')
const postcss = require('gulp-postcss')
const concat = require('gulp-concat')

// include default config
const config = require('./gulp.config')

// sass compiler
sass.compiler = require('node-sass')

/* = Task List
-------------------------------------------------------------- */

// styles
function styles () {
    return src(config.pathsDev.css + '/style.scss')
        .pipe(
            sass({
                outputStyle: config.sassStyle
            }).on('error', sass.logError)
        )
        .pipe(postcss([autoprefixer(config.autoprefixerConfig)]))
        .pipe(
            rename({
                suffix: '.min'
            })
        )
        .pipe(dest(config.pathsProd.css))
}
exports.styles = styles

// scripts
function scripts () {
    return src([config.pathsDev.script + '/*.js'])
        .pipe(uglify())
        .pipe(concat('scripts.js'))
        .pipe(
            rename({
                suffix: '.min'
            })
        )
        .pipe(dest(config.pathsProd.script))
}
exports.scripts = scripts

// watch
function watchList () {
    watch(config.pathsDev.css + '/style.scss', series(styles))
    watch(config.pathsDev.script + '/*.js', series(scripts))
}
exports.watch = watchList

// default
exports.default = series(parallel(watchList))

// init/build
exports.init = series(
    styles,
    scripts,
    done => {
        console.log(config.env + 'All done!')
        done()
    }
)