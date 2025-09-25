<?php

require_once __DIR__ . '/User.php';

class UserManager {
    private $users = [];
    private $nextId = 1;

    public function register($name, $email, $password) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email";
        }

        if ($this->findByEmail($email)) {
            return "Email is already in use";
        }

        $user = new User($this->nextId++, $name, $email, $password);
        $this->users[$user->getId()] = $user;

        return true;
    }

    public function login($email, $password) {
        $user = $this->findByEmail($email);
        if ($user && $user->verifyPassword($password)) {
            return "Login successful";
        }
        return "Invalid credentials";
    }

    public function resetPassword($userId, $newPassword) {
        if (isset($this->users[$userId])) {
            $this->users[$userId]->setPassword($newPassword);
            return true;
        }
        return "User not found";
    }

    private function findByEmail($email) {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $email) {
                return $user;
            }
        }
        return null;
    }
}
