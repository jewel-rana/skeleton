const mix = require('laravel-mix');

mix.options({
    processCssUrls: false
});

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

mix.copy('resources/js/plugin.js', 'public/js')
    .copy('resources/js/custom-scripts.js', 'public/js')
    .copy('resources/css/custom.css', 'public/css')
    .copy('resources/css/custom-media.css', 'public/css')
    .copy('resources/css/plugin.css', 'public/css');

mix.copyDirectory('resources/fonts','public/fonts');
