<?php

namespace src\Validator;

class Validator
{
   
    public function validateEmail(string $email): ?string
    {
        if (empty($email)) {
            return "E-mail é obrigatório";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "E-mail inválido";
        }

        if (strlen($email) > 255) {
            return "E-mail muito longo";
        }

        return null;
    }

    public function validatePassword(string $password): ?string
    {
        if (empty($password)) {
            return "senha é obrigatória";
        }

        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password)) {
            return "senha deve ter pelo menos 8 caracteres, incluindo 1 número e 1 letra maiúscula";
        }

        return null;
    }

    public function validateName(string $name): ?string
    {
        if (empty($name)) {
            return "Nome é obrigatório";
        }

        if (strlen($name) > 100) {
            return "Nome muito longo";
        }

        return null;
    }
}