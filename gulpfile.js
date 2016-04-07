var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
    	.less('app.less', 'public/css/less.css')
    	.styles([
    		'app.css',
    		'sweetalert.css',
    		], 'public/css/main.css')
    	.browserify('app.js')
    	.version(['css/app.css', 'css/less.css', 'css/main.css', 'js/app.js']);
});
