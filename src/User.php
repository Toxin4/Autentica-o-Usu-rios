<?php

declare(strict_types=1);

namespace App;

class UserManager
{
  private array $usuarios;
  private array $logs = [];

  public function __construct()
  {
    $this->usuarios = [
      ['id' => 1, 'nome' => 'João Silva', 'email' => 'joao@email.com', 'senha' => 'SenhaForte1'],
      ['id' => 2, 'nome' => 'Maria Oliveira', 'email' => 'maria@email.com', 'senha' => 'Senha123'],
      ['id' => 3, 'nome' => 'Pedro', 'email' => 'pedro@email.com', 'senha' => 'Senha123'],
    ];
  }

  public function emailValidator(string $email): ?string
  {
    if (empty($email)) {
      $this->logs[] = date('Y-m-d H:i:s') . " - Erro: Email vazio fornecido";
      return "Email é obrigatório";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->logs[] = date('Y-m-d H:i:s') . " - Erro: Email inválido: $email";
      return "Email inválido";
    }

    if (strlen($email) > 255) {
      $this->logs[] = date('Y-m-d H:i:s') . " - Erro: Email muito longo: $email";
      return "Email muito longo";
    }

    return null;
  }

  public function findUser(string $nome, string $email): ?array
  {
    foreach ($this->usuarios as $usuario) {
      if (
        strcasecmp($usuario['nome'], $nome) === 0 &&
        strcasecmp($usuario['email'], $email) === 0
      ) {
        return $usuario;
      }
    }

    return null;
  }

    public function verificarLogin(string $nome, string $email, string $senha): bool
    {
      $erroEmail = $this->emailValidator($email);
      if ($erroEmail !== null) {
        return false;
      }

      $usuario = $this->findUser($nome, $email);

      if (is_null($usuario)) {
        $this->logs[] = date('Y-m-d H:i:s') . " - Login falhou: usuário '$nome' com email '$email' não encontrado.";
        return false;
      }

      if ($usuario['senha'] !== $senha) {
        $this->logs[] = date('Y-m-d H:i:s') . " - Login falhou: senha incorreta para '$nome'.";
        return false;
      }

      $this->logs[] = date('Y-m-d H:i:s') . " - Login realizado para '$nome' ($email).";
      return true;
    }

    public function getLogs(): array
    {
      return $this->logs;
    }
}