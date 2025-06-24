<?php
class userController {
    public function login(){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $user = new User()->login($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['authentication'] = $user['id'];
            echo json_encode(["success" => "Logged in successfully!"]);
            header("Location: /");

        } else {
            echo json_encode(["error" => "Invalid login!"]);
        }
    }

    public function logout(){
        session_destroy();
        header("Location: /");
    }
}