const mix = require('laravel-mix');
mix.webpackConfig({
    output: {
        // Chunks in webpack
        publicPath: '/',
        chunkFilename: '[name].js',
    },

});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js/ai-solutions')
    .extract(['vue'])
    .minify('public/js/ai-solutions/app.js')
    .version();

/*
if (mix.inProduction()) {
    mix.version();
   /!* mix.version(['public/js/manifest.js']);
    mix.version(['public/js/vendor.js']);
    mix.version(['public/js/app.min.js']);*!/
}
*/
