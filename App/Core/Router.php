<?php

$routes = [
    '/acceuil' => [
        'controller' => 'note.Controller',
        'action' => 'acceuil'
    ],
    '/' => [
        'controller' => 'auth.Controller',
        'action' => 'connexion'
    ],
    '/logout' => [
        'controller' => 'auth.Controller',
        'action' => 'deconnexion'
    ],

];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$route = $routes[$uri] ?? null;

if ($route === null) {
    http_response_code(404);
    echo "not_found";
    exit;
}

$controller = $route['controller'];
$action = $route['action'];

require_once __DIR__ . "/../Controllers/" . $controller . ".php";

$action();

