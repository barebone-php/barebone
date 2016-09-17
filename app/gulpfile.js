var gulp = require('gulp');
var elixir = require('laravel-elixir');
elixir.config.assetsPath = '.';
elixir.config.publicPath = '../public';

/**
 * Elixir Tasks
 */
elixir(function(mix) {

  mix.browserify('app.js');
  mix.sass('app.scss');

});
