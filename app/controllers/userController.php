<?php

require_once __DIR__ . "/../../core/autoloader.php";
Autoloader::register_autoloader();

class userController {
    public function login(){
        try {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $User = User::login($email);
            if (! password_verify($password, $User->password)) 
                throw new Exception("Senha ou usuario invalido");
            $_SESSION['authentication'] = $User->id;   
            echo json_encode(["success" => "Logged in successfully!"]);
            header("Location: /");
        } catch (Exception $e) {
            error_log("Erro na conexão ou execução da consulta: " . $e->getMessage());
            echo json_encode(["error" => $e->getMessage()]);
        }
    }

    public function logout(){
        isset($_SESSION['authentication']) && !empty($_SESSION['authentication']);
        session_destroy();
        header("Location: /");
    }
}