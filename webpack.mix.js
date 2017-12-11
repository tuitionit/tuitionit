const { mix } = require('laravel-mix');
const WebpackRTLPlugin = require('webpack-rtl-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.copyDirectory('node_modules/fullcalendar/dist', 'public/js/plugins/fullcalendar')

    // Moment.js
    .copyDirectory('node_modules/moment/min', 'public/js/plugins/moment')

    // Bootstrap DateTimePicker
    .copyDirectory('node_modules/eonasdan-bootstrap-datetimepicker/build/js', 'public/js/backend/plugin/bootstrap-datetimepicker')
    .copyDirectory('node_modules/eonasdan-bootstrap-datetimepicker/build/css', 'public/css/backend/plugin/bootstrap-datetimepicker')

    // Select2
    .copyDirectory('node_modules/select2/dist/js', 'public/js/backend/plugin/select2')
    .copyDirectory('node_modules/select2/dist/css', 'public/css/backend/plugin/select2')
    .copy('node_modules/select2-bootstrap-theme/dist/select2-bootstrap.min.css', 'public/css/backend/plugin/select2')

    // List.js
    .copy('node_modules/list.js/dist/list.min.js', 'public/js/plugins/list.js/list.min.js')

    .sass('resources/assets/sass/frontend/app.scss', 'public/css/frontend.css')
    .sass('resources/assets/sass/backend/app.scss', 'public/css/backend.css')
    .js([
        'resources/assets/js/frontend/app.js',
        'resources/assets/js/plugin/sweetalert/sweetalert.min.js',
        'resources/assets/js/plugins.js'
    ], 'public/js/frontend.js')
    .js([
        'resources/assets/js/backend/app.js',
        'resources/assets/js/plugin/sweetalert/sweetalert.min.js',
        'resources/assets/js/plugins.js'
    ], 'public/js/backend.js')
    .webpackConfig({
        plugins: [
            new WebpackRTLPlugin('/css/[name].rtl.css')
        ]
    })
    .version();
