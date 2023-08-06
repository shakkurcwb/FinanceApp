const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/components/account-graphs.js', 'public/js/components')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.browserSync('http://localhost:8000');

mix.disableNotifications();