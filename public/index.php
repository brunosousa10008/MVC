<?php
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Helpers.php';
require_once __DIR__ . '/../routes/router.php';

$router = new Router($routes);
$router->handle($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);