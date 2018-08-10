var gulp = require('gulp') ;
var path = require('path');
var swPrecache = require('sw-precache');

const rootDir = './public';

gulp.task('sw', callback => {
  swPrecache.write(path.join(rootDir, 'sw.js'), {
    staticFileGlobs: [
      // Suit et met en cache tous les fichiers qui correspondent à ce modèle
      rootDir + '/**/*.{js,html,css,png,jpg,gif,ttf,otf}',
    ],
    stripPrefix: rootDir
  }, callback);
});