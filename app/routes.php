<?php use \Barebone\Router;
/**
 * Here you can define your routes.
 */
Router::get('/', 'Site:index');
Router::get('/hello/{name}', 'Site:hello');
Router::get('/google', 'Site:google');


