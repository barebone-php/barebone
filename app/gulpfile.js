'use strict';

var gulp = require('gulp');
var elixir = require('laravel-elixir');

elixir.config.assetsPath = 'frontend';
elixir.config.publicPath = '../public';

elixir(function(mix) {
    mix.browserify('app.js');
    mix.sass('app.scss');
});
