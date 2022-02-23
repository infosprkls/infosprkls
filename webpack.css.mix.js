const mix = require('laravel-mix');
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
/*mix.sass('public/scss/_navbar.scss', 'public/css')*/

mix
    .sass('public/scss/base/_mixin.scss', 'public/css/base')
    .sass('public/scss/base/_typography.scss', 'public/css/base')
    .sass('public/scss/base/_variables.scss', 'public/css/base')
    .sass('public/scss/layout/card.scss', 'public/css/layout')
    .sass('public/scss/layout/_form.scss', 'public/css/layout')
    .sass('public/scss/layout/_nav.scss', 'public/css/layout')
    .sass('public/scss/layout/_sidebar.scss', 'public/css/layout')
    .sass('public/scss/layout/_structure.scss', 'public/css/layout')
    .sass('public/scss/layout/_table.scss', 'public/css/layout')
    .sass('public/scss/layout/_horizontal-tabs.scss', 'public/css/layout')
    .sass('public/scss/components/_buttons.scss', 'public/css/components')
    .sass('public/scss/components/_dropdowns.scss', 'public/css/components')
    .sass('public/scss/components/_table_header.scss', 'public/css/components')
    .sass('public/scss/components/_modal.scss', 'public/css/components')
    .sass('public/scss/components/_multiselect.scss', 'public/css/components')
    .sass('public/scss/components/_alert.scss', 'public/css/components')
    .sass('public/scss/pages/_user.scss', 'public/css/pages')
    .sass('public/scss/pages/_settings.scss', 'public/css/pages')
    .sass('public/scss/pages/_projects.scss', 'public/css/pages')
    .sass('public/scss/pages/_dashboard.scss', 'public/css/pages')
    .sass('public/scss/pages/_superUser.scss', 'public/css/pages')
    
/*mix.extract(['jquery', 'bootstrap', 'lodash', 'popper.js', 'vue'])*/

