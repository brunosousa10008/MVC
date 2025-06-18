<?php

function load(string $controller, string $action) {
    $controllerPath = "../app/controllers/{$controller}.php";
    
    // Verifica se o arquivo do controller existe
    if (!file_exists($controllerPath)) {
        echo "O arquivo do controller {$controller}.php não foi encontrado.";
        return;
    }

    // Inclui o controller
    require_once $controllerPath;

    // Verifica se a classe existe
    if (!class_exists($controller)) {
        echo "A classe do controller {$controller} não existe.";
        return;
    }

    $controllerObject = new $controller;

    if(!method_exists($controllerObject,$action)){
        echo "O método $action não existe no $controller não existe";
    }

    $controllerObject->$action();
}

function view(string $view) {
    $viewPath = __DIR__ . "/../app/views/{$view}.php";

    if (!file_exists($viewPath)) {
        http_response_code(404);
        echo "View '{$view}' não encontrada.";
        exit;
    }
    require $viewPath;
}