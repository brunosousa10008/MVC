<?php

class Autoloader {
    public static function register_autoloader() {
        spl_autoload_register([self::class, 'load_autoloader']);
    }
    public static function load_autoloader(string $className){
        $directories = [__DIR__ ."/../app/models", __DIR__ ."/../core", __DIR__ ."/../database"];

        foreach ($directories as $directory) {
            $file = "$directory/$className.php";
            if (file_exists($file)) {
                include_once($file);
                break;
            }
        }

    }
}


