var Encore = require('@symfony/webpack-encore');
const CopyWebpackPlugin = require('copy-webpack-plugin');


Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    // the public path you will use in Symfony's asset() function - e.g. asset('build/some_file.js')
    .setManifestKeyPrefix('build/')

    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())

    // the following line enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    .addEntry('app', './assets/js/app.js')
    .addStyleEntry('css/admin', './assets/sass/partials/admin.scss')

    // uncomment if you use Sass/SCSS files
    .enableSassLoader()

    .addPlugin(
        new CopyWebpackPlugin([
            { from: "./assets/images", to: "images" },
            { from: "./assets/sass/bootstrap.min.css", to: "bootstrap.min.css" }
            ])
        )

    // uncomment for legacy applications that require $/jQuery as a global variable
    //.autoProvidejQuery()



    ;

    module.exports = Encore.getWebpackConfig();
