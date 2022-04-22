const { version, sass } = require('laravel-mix');
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
    .css('resources/css/fontawesome.css', 'assets/css/fontawesome.css')
    
    .sass('resources/sass/adm/app.scss', 'assets/css/adm/app.css')
    .sass('resources/sass/adm/login.scss', 'assets/css/adm/login.css')
    
    .js('resources/js/fontawesome.js', 'assets/js/fontawesome.js')

    .js('node_modules/chart.js/dist/chart.js', 'assets/js/chart.js')
    .js('resources/js/adm/login.js', 'assets/js/adm/login.js')
    .js('resources/js/adm/app.js', 'assets/js/adm/app.js')

    .version();
