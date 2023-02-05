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
    .setPublicPath('build')
    .sass('resources/styles/main_style.scss', 'css')
    .copy('resources/assets/images', 'build/images')
    .copy('public/me', 'build/me')
    .version();