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

mix.js('resources/js/app.js', 'public/assets/js/')
   .sass('resources/scss/app.scss', 'public/assets/css/')
   .sass('resources/scss/icons.scss', 'public/assets/css/')
   .sass('resources/scss/bootstrap.scss', 'public/assets/css/');
