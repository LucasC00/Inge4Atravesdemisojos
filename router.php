<?php
require __DIR__."/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

class Router {
    private $routes = [];

    public function addRoute($method, $path, $controllerMethod) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controllerMethod' => $controllerMethod,
        ];
    }

    public function handleRequest() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestPath = $_SERVER['REQUEST_URI'];

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestPath) {
                list($controllerClass, $method) = explode('@', $route['controllerMethod']);
                $controllerInstance = new $controllerClass();
                $controllerInstance->$method();
                return;
            }
        }

        // Manejar la ruta no encontrada
        http_response_code(404);
        echo "Ruta no encontrada.";
    }
}