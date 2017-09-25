const mix = require('laravel-mix');
const path = require('path');

/* eslint-disable global-require */
mix
    .setPublicPath('public')
    .js('resources/assets/js/app.js', 'public/js')
    .extract(['vue', 'jquery', 'jquery-ui'])
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/frontend.scss', 'public/css')
    .copy('public', '../../../public/vendor/webclip')
    .version();

mix.options({
    extractVueStyles: true,
});

mix.webpackConfig({
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/assets/js'),
        },
    },
});
