const { version } = require('laravel-mix');
const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .css('node_modules/@fortawesome/fontawesome-free/css/all.css', '_MODELO/assets/css/fontawesome.css')

    .js('node_modules/@fortawesome/fontawesome-free/js/all.js', '_MODELO/assets/js/fontawesome.js')

    .version;
