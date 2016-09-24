<?php use \Barebone\Router;
/**
 * Here you can define your routes.
 */
Router::get('/', 'ExampleController:index');
Router::get('/hello/{name}', 'ExampleController:hello');
Router::get('/json/{name}', 'ExampleController:print_json');
Router::get('/google', 'ExampleController:redirect_to_google');
Router::get('/session', 'ExampleController:test_session');
Router::get('/logger', 'ExampleController:logger');

Router::map(['GET','POST'], '/login', 'ExampleUsersController:login');
Router::map(['GET','POST'], '/signup', 'ExampleUsersController:signup');
Router::get('/logout', 'ExampleUsersController:logout');

