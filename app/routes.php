<?php use \Barebone\Router;
/**
 * Here you can define your routes.
 */
Router::get('/', 'Example:index');
Router::get('/hello/{name}', 'Example:hello');
Router::get('/json/{name}', 'Example:print_json');
Router::get('/google', 'Example:redirect_to_google');
Router::get('/session', 'Example:test_session');
Router::get('/logger', 'Example:logger');


