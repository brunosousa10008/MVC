<?php
session_start();

require_once __DIR__ . "/../core/autoloader.php";
Autoloader::register_autoloader();

include_once __DIR__ . "/../routes/router.php";

$router = new Router($routes);
$router->handle($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);