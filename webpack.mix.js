let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
mix.sass('resources/scss/main.scss', 'public/css');
mix.minify('public/css/app.css');
mix.copy(
    'node_modules/@fortawesome/fontawesome-free/webfonts',
    'public/webfonts'
);