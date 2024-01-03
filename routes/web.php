<?php
namespace routes;

require_once '../app/Autoloader.php';

use \app\Router;

Router::get('/users/{id}', 'UserController', 'show');
Router::get('/users', 'UserController', 'index');
Router::get('/users/{id}/edit', 'UserController', 'edit');
Router::get('/users/create', 'UserController', 'create');
Router::post('/users', 'UserController', 'store');
Router::delete('/users/{id}', 'UserController', 'delete');
Router::put('/users/{id}/update', 'UserController', 'update');

