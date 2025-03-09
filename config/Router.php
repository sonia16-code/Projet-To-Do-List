<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'GuestHomeController.php',
    '/task' => 'HomeController.php',
    '/login' => 'LoginController.php',
    '/logout' => 'LogoutController.php',
    '/register' => 'RegisterController.php',
    '/task-add' => 'TaskController.php',
    '/task-update' => 'TaskController.php',
];

if(array_key_exists($uri, $routes)){
    require_once(__DIR__  ."/../src/Controllers/" .$routes[$uri]);
} else{
    http_response_code(404);
    require_once(__DIR__.'/../src/Controllers/404.php');
}