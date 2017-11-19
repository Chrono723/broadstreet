let mix = require('laravel-mix');

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
mix.browserSync('localhost/broadstreet/public');
mix.setResourceRoot('../');
mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css').options({
    processCssUrls: false
})
    .js('resources/assets/js/scripts.js', 'public/js')
    //pages
    .js('resources/assets/js/pages/home.js', 'public/js/pages/')
    .js('resources/assets/js/pages/admin.js', 'public/js/pages/');


mix.scripts([
    'resources/assets/js/lib/visible.js',
    'resources/assets/js/lib/menuzord.js',
    'resources/assets/js/lib/jquery.nav.js',
    'resources/assets/js/lib/wow.min.js',
    'resources/assets/js/lib/owl.carousel.min.js',
    'resources/assets/js/lib/smooth.js',
], 'public/js/vendor.js');

// Extra conflicting SCSS from ADMIN panel
mix.sass('resources/assets/sass/admin.scss', 'public/css') .options({
    processCssUrls: false
});

mix.copyDirectory('resources/assets/img/', 'public/images');

mix.copy('resources/assets/fonts', 'public/fonts');