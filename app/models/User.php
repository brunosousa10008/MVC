<?php
class User extends Model
{
    public function login(string $email) {
        try {
            $sql = "SELECT * FROM users 
                    WHERE email = :email 
                    AND active = 1";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (PDOException $e) {
            error_log("Erro na conexão ou execução da consulta: " . $e->getMessage());
            return false;

        }
    }  
} 