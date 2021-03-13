const filelist = require('gulp-filelist'); // To list files
const fs = require("fs"); // To list files

const gulp = require('gulp');
const path = require("path"); // To list files
const pug = require('gulp-pug-3'); // Template engine https://github.com/pugjs/pug
const stylus = require('gulp-stylus'); // CSS preprocessor

// https://coderrocketfuel.com/article/recursively-list-all-the-files-in-a-directory-using-node-js
const getAllFiles = function(dirPath, arrayOfFiles) {
  files = fs.readdirSync(dirPath)
  arrayOfFiles = arrayOfFiles || []
  files.forEach(function(file) {
    if (fs.statSync(dirPath + "/" + file).isDirectory()) {
      arrayOfFiles = getAllFiles(dirPath + "/" + file, arrayOfFiles)
    } else {
      arrayOfFiles.push(path.join(__dirname, dirPath, "/", file))
    }
  })
  return arrayOfFiles
}

// CSS
gulp.task('styles', () =>
  gulp.src('src/css/styles.styl')
    .pipe(stylus())
    .pipe(gulp.dest('html/css/'))
);

// HTML
gulp.task('html', () =>
  gulp.src('src/html/**/*.pug')
    .pipe(pug())
    .pipe(gulp.dest('html'))
);

// LIST PHOTOS
gulp.task('photos', () =>
  gulp.src(getAllFiles('./html/photos/'))
    .pipe(filelist('photos.json'))
    .pipe(gulp.dest('html/data'))
);

// WATCH
gulp.task('watch', gulp.series('styles', 'html', 'photos', (done) => {
  gulp.watch('src/css/**/*.styl', gulp.parallel('styles'));
  gulp.watch('src/html/**/*.pug', gulp.parallel('html'));
}));

// TASKS
// Bundled tasks
gulp.task('default', gulp.series('photos', 'styles', 'html'));
