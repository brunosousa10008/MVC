<?php
class User {
    private $pdo;

    public function __construct() {
        $db = new ConnectDatabase();
        $this->pdo = $db->getPDO();

    }

    public function login(string $email, string $password) {
        try {
            $sql = "SELECT * FROM users 
                    WHERE email = :email 
                    AND active = 1";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['authentication'] = $user['id'];
                return true;

            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Erro na conexão ou execução da consulta: " . $e->getMessage());
            return false;

        }
    }  

    public function logout(){
        if (isset($_SESSION['authentication']) && !empty($_SESSION['authentication'])){
            session_destroy();
        }
    }
} 