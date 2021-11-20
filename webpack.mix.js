const { browserSync } = require('laravel-mix');
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

//  Old Config 

mix.js("resources/frontend/js/app.js", "public/js");

mix.sass('resources/frontend/sass/app.scss', 'public/css')
    .options({
        postCss: [
            require('postcss-css-variables')()
        ]
    });

    // browserSync 
mix.browserSync({
    proxy: 'pita.test',
    injectChanges: true,
    clearCashe: true,
});
