<?php
class Router {   
    private array $routes;

    public function __construct($routes) {
        $this->routes = $routes;
    }

    public function handle(string $uri, string $method)  {
        $uri = parse_url($uri, PHP_URL_PATH);
        $method = strtoupper($method);

        if (isset($this->routes[$method][$uri])) {
            $callback = $this->routes[$method][$uri];
            $callback();
        } else {
            http_response_code(404);
            echo "404 - Página não encontrada";
        }
    }

}
