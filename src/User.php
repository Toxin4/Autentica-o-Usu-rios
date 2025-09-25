<?php

class User {
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct($id, $name, $email, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function verifyPassword($password) {
        return password_verify($password, $this->password);
    }

    public function setPassword($newPassword) {
        $this->password = password_hash($newPassword, PASSWORD_DEFAULT);
    }
}
