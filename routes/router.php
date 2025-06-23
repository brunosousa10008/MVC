<?php

$routes = [
    "GET" => [
        "/" => fn() => Helpers::loadController("pageController", "dashboardView"),
        "/login" => fn() => Helpers::loadController("pageController", "loginView"),
        "/logout" => fn() => Helpers::loadController("userController", "logout")
    ],

    "POST" => [
        "/login" => fn() => Helpers::loadController("userController", "login")
    ]
];