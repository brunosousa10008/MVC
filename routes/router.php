<?php

$routes = [
        "GET" => [
            "/" => fn() => load("HomeController", "index"),
            "/store" => fn() => load("StoreController", "index")
        ],
];
