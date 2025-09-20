<?php

class User {
  private int $id;
  private string $nome;
  private string $email;
  private hash $senha;

  public function __construct() {
    $this->usuarios = [
      ['id' => 1, 'nome' => 'João Silva', 'email' => 'joao@email.com','senha' => 'SenhaForte1'],
      ['id' => 2, 'nome' => 'Maria Oliveira', 'email' => 'maria@email.com','senha' => 'Senha123'],
      ['id' => 3, 'nome' => 'Pedro', 'email' => 'pedro@@email','senha' => 'Senha123'],
    ];
  }

  public function emailValidator() {
    if (empty($email)) {
      $this->logs[] = date('Y-m-d H:i:s') . " - Erro: Email vazio fornecido";
      return "Email é obrigatório";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->logs[] = date('Y-m-d H:i:s') . " - Erro: Email inválido: " . $email;
      return "Email inválido";
    }
    if (strlen($email) > 255) {
      $this->logs[] = date('Y-m-d H:i:s') . " - Erro: Email muito longo: " . $email;
      return "Email muito longo";
    }
    return null;
  }
}