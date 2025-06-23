<?php

class Helpers{
    public static function loadController(string $controller, string $action):void {
        $controllerPath = __DIR__ . "/../app/controllers/{$controller}.php";
        // Verifica se o arquivo do controller existe
        if (!file_exists($controllerPath)) {
            throw new Exception("The controller file {$controller}.php was not found.");
        }

        // Inclui o controller
        require_once $controllerPath;

        // Verifica se a classe existe
        if (!class_exists($controller)) {
            throw new Exception("The controller class {$controller} does not exist.");
        
        }

        $controllerObject = new $controller;

        // Verifica se o método existe
        if(!method_exists($controllerObject,$action)){
            throw new Exception("Method $action does not exist in $controller does not exist");
        }

        //Chama a classe e o método
        $controllerObject->$action();
    }

    public static function view(string $name){
        $viewPath = __DIR__ . "/../app/views/pages/{$name}.php";
        if(!file_exists($viewPath)){
            http_response_code(500);
            throw new Exception("The view file {$name}.php was not found.");
        }

        include_once $viewPath;
    }

    public static function loadEnv($path) {
        if (!file_exists($path)) {
            throw new Exception(".env file not found at {$path}");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $line = trim($line);

            // Ignora comentários e linhas em branco
            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }

            // Divide em chave=valor apenas na primeira ocorrência de "="
            $equalPos = strpos($line, '=');
            if ($equalPos === false) {
                continue; // linha malformada
            }

            $name = trim(substr($line, 0, $equalPos));
            $value = trim(substr($line, $equalPos + 1));

            // Remove aspas (simples ou duplas) se houver
            if (
                (str_starts_with($value, '"') && str_ends_with($value, '"')) ||
                (str_starts_with($value, "'") && str_ends_with($value, "'"))
            ) {
                $value = substr($value, 1, -1);
            }

            // Define nos ambientes
            putenv("{$name}={$value}");
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}
