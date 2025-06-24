<?php

namespace App\Requests;

class AuthRequest
{
    // classe para validacao de dados

    // filter_var
    // com as flags para SANITIZE e VALIDATE
    /**
     * Se sucesso retorna a variavel
     * Se falha retorna false
     * @param string $email
     * @return string|bool
     */
    public function validateEmail(string $email): string|bool
    {
        $emailSanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
        return filter_var($emailSanitized, FILTER_VALIDATE_EMAIL);
    }
}
