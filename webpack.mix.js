const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ]);

/*
Demo Not Intended To Used Be In Production
if (mix.inProduction()) {
    mix.version();
}
*/
