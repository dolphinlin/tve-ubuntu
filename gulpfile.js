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
  var bootstrapPath = 'node_modules/bootstrap-sass/assets';
  mix.coffee('app.coffee');
  mix.coffee('teacher.coffee');
  mix.coffee('formdata.coffee');
  mix.coffee('netres.coffee');
  mix.coffee('paper.coffee');
  mix.coffee('reg.coffee');
  mix.coffee('enroll.coffee');
  mix.sass('app.scss')
    .copy(bootstrapPath + '/fonts', 'public/fonts')
    .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js');
  mix.scripts([
  	'flot-data.js',
  	'morris-data.js',
  	]);
});
