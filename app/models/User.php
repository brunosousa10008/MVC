<?php

class User extends Model
{
    // deve reunir apenas consultas ao modelo.
        // TODO: aplicar uma logica mais avançada e aninha metodos: SELECT()->WHERE()->GET();
    public static function login(string $email) {
        $sql = "SELECT * FROM users 
        WHERE email = :email 
        AND active = 1";

        $stmt = (new self())->pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(!$result) return null;
        $User = new User();
        foreach($result as $key => $value){
            $User->$key = $value;
        }
        return $User;
    }  
} 