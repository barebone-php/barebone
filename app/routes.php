<?php use \Barebone\Router;
/**
 * Here you can define your routes.
 */
Router::get('/', 'Example:index');
Router::get('/hello/{name}', 'Example:hello');
Router::get('/json/{name}', 'Example:json');
Router::get('/google', 'Example:google');


