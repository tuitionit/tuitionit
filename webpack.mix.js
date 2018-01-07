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

    // Chart.js
    .copy('node_modules/chart.js/dist/Chart.min.js', 'public/js/plugins/chart.js/Chart.min.js')

    // List.js
    .copy('node_modules/list.js/dist/list.min.js', 'public/js/plugins/list.js/list.min.js')

    // instascan
    .copy('resources/assets/js/plugin/instascan/instascan.min.js', 'public/js/plugins/instascan/instascan.min.js')

    // DataTables
    .copy('node_modules/admin-lte-sass/plugins/datatables/jquery.dataTables.min.js', 'public/js/backend/plugin/datatables/jquery.dataTables.min.js')
    .copy('node_modules/admin-lte-sass/plugins/datatables/dataTables.bootstrap.min.js', 'public/js/backend/plugin/datatables/dataTables.bootstrap.min.js')
    .copy('node_modules/datatables.net-bs/css/dataTables.bootstrap.css', 'public/css/backend/plugin/datatables/dataTables.bootstrap.min.css') // find a minified version
    .scripts([
        'node_modules/datatables.net/js/jquery.dataTables.js',
        'node_modules/datatables.net-bs/js/dataTables.bootstrap.js',
        'node_modules/datatables.net-buttons/js/dataTables.buttons.js',
        'node_modules/datatables.net-buttons-bs/js/buttons.bootstrap.js'
    ], 'public/js/backend/plugin/datatables/datatables.js')
    .styles([
        'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
        'node_modules/datatables.net-buttons-bs/css/buttons.bootstrap.css',
    ], 'public/css/backend/plugin/datatables/datatables.css')

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
