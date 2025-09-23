<?php

namespace src\UserManager;

use src\User\User;
use src\Validator\Validator;

class UserManager
{
    private array $user = [];
    private Validator $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
        $this->user = [
            new User(1, 'João Silva', 'joao@email.com', password_hash('PasswordForte1', PASSWORD_DEFAULT)),
            new User(2, 'Maria Oliveira', 'maria@email.com', password_hash('Password123', PASSWORD_DEFAULT)),
            new User(3, 'Pedro', 'pedro@email.com', password_hash('Password123', PASSWORD_DEFAULT)),
        ];
    }

    public function Login(string $name, string $email, string $Password): bool
    {
        $errorName = $this->validator->ValidateName($name);
        $errorEmail = $this->validator->validateEmail($email);
        $errorPassword = $this->validator->validatePassword($Password);

        if ($errorName || $errorEmail || $errorPassword) {
            return false;
        }

        foreach ($this->user as $user) {
            if (
                strcasecmp($user->getName(), $name) === 0 &&
                strcasecmp($user->getEmail(), $email) === 0 &&
                password_verify($Password, $user->getPassword())
            ) {
                return true;
            }
        }

        return false;
    }

    public function resetPassword(int $id, string $newPassword): string
    {
        $errorPassword = $this->validator->validatePassword($newPassword);
        
        if ($errorPassword) {
            return $erroPassword;
        }

        foreach ($this->user as $user) {
            if ($user->getId() === $id) {
                $user = new User($user->getId(), $user->getname(), $user->getEmail(), password_hash($newPassword, PASSWORD_DEFAULT));
                return "Senha alterada com sucesso!";
            }
        }

        return "Usuário não encontrado.";
    }
    
    public function register(string $name, string $email, string $password) {
    if (in_array($email, array_column($this->users, "email"))) {
        echo "E-mail já está em uso! <br>";
        return;
    }

    try {
        $user = new User($name, $email, $password);
    } catch (InvalidArgumentException $e) {
        echo "Erro: " . $e->getMessage();
        return;
    }

    $this->users[] = [
        "id" => $this->nextId++,
        "name" => $user->getName(),
        "email" => $user->getEmail(),
        "password" => $user->getPassword()
    ];

    echo "Usuário cadastrado com sucesso!<br>";
}
}