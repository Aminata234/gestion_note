<?php

class Router
{
    public array $routes = [
        '/' => [
            'controller' => 'NoteController',
            'action' => 'accueil'
        ],
    ];


    public function run(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $route = $this->routes[$uri] ?? null;

        if ($route === null) {
            http_response_code(404);
            echo "not_found";
            exit;
        }

        $controller = $route['controller'];
        $action = $route['action'];

        require_once __DIR__ . "/../Controllers/" . $controller . ".php";

        $controllerObject = new $controller();

        $controllerObject->$action();
    }
}