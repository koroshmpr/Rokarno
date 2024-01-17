const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js/app.js')
    .js('resources/js/costomize.js', 'public/js/costomize.js') // Add this line for the new JavaScript file
    .sass('resources/sass/custom.scss', 'public/css/style.css', {}, [
        require("rtlcss")({}),
    ])
    .options({
        processCssUrls: true,
    });

mix.webpackConfig({
    stats: {
        children: true,
    },
});
