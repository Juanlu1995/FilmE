let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/validateRegister.js', 'public/js')
    .js('resources/assets/js/paginateIndex.js', 'public/js')
    .js('resources/assets/js/filmGraph.js', 'public/js')
    .js('resources/assets/js/contributeAutocomplete.js', 'public/js')
    .js("resources/assets/js/paginateReviews.js", "public/js")
    .js('resources/assets/js/modals.js', 'public/js')
    .styles(["node_modules/izimodal/css/iziModal.css"], 'public/css/iziModal.css')
    .styles(['resources/assets/css/spinner.css', 'resources/assets/css/own.css'], 'public/css/all.css')
    .sass('resources/assets/sass/app.scss', 'public/css');
