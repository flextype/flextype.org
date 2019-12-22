const gulp = require('gulp');
const tailwindConfig = "tailwind.config.js"; /* Path to Tailwind config */
const mainCSS = "assets/src/styles.css"; /* Path to main stylesheet */

/**
 * Custom PurgeCSS Extractor
 * https://github.com/FullHuman/purgecss
 */
class TailwindExtractor {
  static extract(content) {
    return content.match(/[\w-/:]+(?<!:)/g);
  }
}

gulp.task("css-dev", function() {
  const atimport = require("postcss-import");
  const postcss = require("gulp-postcss");
  const tailwindcss = require("tailwindcss");
  const concat = require('gulp-concat');
  const csso = require('gulp-csso');
  const autoprefixer = require('gulp-autoprefixer');

  return gulp
    .src(mainCSS)
    .pipe(postcss([atimport(), tailwindcss(tailwindConfig)]))
    .pipe(autoprefixer({
        overrideBrowserslist: [
            "last 1 version"
        ],
        cascade: false
    }))
    .pipe(concat('dev.css'))
    .pipe(gulp.dest("assets/dist/css/"));
});

gulp.task("css-production", function() {
  const atimport = require("postcss-import");
  const postcss = require("gulp-postcss");
  const tailwindcss = require("tailwindcss");
  const purgecss = require("gulp-purgecss");
  const concat = require('gulp-concat');
  const csso = require('gulp-csso');
  const sourcemaps = require('gulp-sourcemaps');
  const autoprefixer = require('gulp-autoprefixer');

  return gulp
    .src(mainCSS)
    .pipe(postcss([atimport(), tailwindcss(tailwindConfig)]))
    .pipe(
      purgecss({
        content: ["**/*.html", "../../**/*.md"],
        extractors: [
          {
            extractor: TailwindExtractor,
            extensions: ["html", "md"]
          }
        ]
      })
    )
    .pipe(autoprefixer({
        overrideBrowserslist: [
            "last 1 version"
        ],
        cascade: false
    }))
    .pipe(csso())
    .pipe(concat('build.min.css'))
    .pipe(gulp.dest("assets/dist/css/"));
});


gulp.task('js', function(){
  return gulp.src(['node_modules/@fortawesome/fontawesome-free/js/all.min.js'])
    .pipe(gulp.dest('assets/dist/js/'));
});
