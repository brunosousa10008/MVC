<?php

require_once __DIR__ . "/../../core/autoloader.php";
Autoloader::register_autoloader();

class userController {
    public function login(){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $user = new User();

        if ($user->login($email, $password)) {
            echo json_encode(["success" => "Logged in successfully!"]);
            header("Location: /");
        } else {
            echo json_encode(["error" => "Invalid login!"]);
        }
    }

    public function logout(){
        $user = new User();

        $user->logout();
        header("Location: /");
    }
}