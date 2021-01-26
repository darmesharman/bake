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

<<<<<<< HEAD
mix.js('resources/js/app.js', 'public/js').vue()
=======
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/php/scss/theme.scss', 'public/css/theme.css')
>>>>>>> front
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .webpackConfig(require('./webpack.config'));
<<<<<<< HEAD

if (mix.inProduction()) {
    mix.version();
}
=======
;
>>>>>>> front
