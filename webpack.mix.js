const mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');
require('dotenv').config();

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

// mix.js('resources/js/app.js', 'public/js')
    // .sass('resources/sass/app.scss', 'public/css');

// #region Vuex Admin Dashboard Assets
mix.js('resources/js/app.js', 'public/admin/js')
    .webpackConfig({
        resolve: {
            alias: {
                '@': path.resolve(__dirname, 'resources/js/src'),
                '@assets': path.resolve(__dirname, 'resources/assets'),
                '@sass': path.resolve(__dirname, 'resources/sass')
            }
        }
    })
    .sass('resources/sass/app.scss', 'public/admin/css').options({
        postCss:[require('autoprefixer'), require('postcss-rtl')]
    })
    .postCss('resources/assets/css/main.css', 'public/admin/css', [
        tailwindcss('tailwind.js'), require('postcss-rtl')()
    ])
    .copy('node_modules/vuesax/dist/vuesax.css', 'public/admin/css/vuesax.css') // Vuesax framework css
    .copy('resources/assets/css/iconfont.css', 'public/admin/css/iconfont.css') // Feather Icon Font css
    .copyDirectory('resources/assets/fonts', 'public/admin/fonts') // Feather Icon fonts
    .copyDirectory('node_modules/material-icons/iconfont', 'public/admin/css/material-icons') // Material Icon fonts
    .copyDirectory('node_modules/material-icons/iconfont/material-icons.css', 'public/admin/css/material-icons/material-icons.css') // Material Icon fonts css
    .copy('node_modules/prismjs/themes/prism-tomorrow.css', 'public/admin/css/prism-tomorrow.css') // Prism Tomorrow theme css
    .copyDirectory('resources/assets/images', 'public/admin/images'); // Copy all images from resources to public folder
// mix.browserSync('http://127.0.0.1:8080');
mix.browserSync({
    proxy: 'http://127.0.0.1:8080'
});

// Change below options according to your requirement
// if (mix.inProduction()) {
//     mix.version();
//     mix.webpackConfig({
//         output: {
//             publicPath: '/demo/vuexy-vuejs-laravel-admin-template/demo-1/',
//             chunkFilename: 'js/chunks/[name].[chunkhash].js',
//         }
//     });
//     mix.setResourceRoot("/demo/vuexy-vuejs-laravel-admin-template/demo-1/");
// }
// else{
//     mix.webpackConfig({
//         output: {
//             chunkFilename: 'js/chunks/[name].js',
//         }
//     });
// }   
// #endregion



// #region Public Assets
mix.js('resources/js/public.js', 'public/public/js/public.js');
    // .sass('resources/sass/app.scss', 'public/css');
// #endregion