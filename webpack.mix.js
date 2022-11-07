let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
mix.js('resources/js/dataTags.js', 'public/js')
mix.js('resources/js/explore.js', 'public/js')
mix.js('resources/js/country.js', 'public/js')
mix.js('resources/js/post.js', 'public/js')
mix.js('resources/js/adminUsers.js', 'public/js')
mix.js('resources/js/adminPosts.js', 'public/js')
mix.sass('resources/scss/main.scss', 'public/css');
mix.minify('public/css/app.css');
mix.copy(
    'node_modules/@fortawesome/fontawesome-free/webfonts',
    'public/webfonts'
);