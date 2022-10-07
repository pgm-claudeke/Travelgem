let mix = require('laravel-mix');

mix.sass('resources/scss/main.scss', 'public/css');
mix.minify('public/css/app.css');