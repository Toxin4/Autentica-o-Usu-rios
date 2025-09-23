<?php

require_once __DIR__ . '/../src/User.php';
require_once __DIR__ . '/../src/UserManager.php';
require_once __DIR__ . '/../src/Validator.php';

use src\UserManager\UserManager;
use src\Validator\Validator;

$validator = new Validator();
$manager   = new UserManager($validator);

echo "<h2>Caso 1: Login Válido</h2>";
$nameTypedValid     = "Maria Oliveira";
$emailTypedValid    = "maria@email.com";
$passwordTypedValid = "Password123";
$resultValid = $manager->login($nameTypedValid, $emailTypedValid, $passwordTypedValid);
echo $resultValid ? "<p>Login realizado com sucesso!</p>" : "<p>Nome, email ou senha incorretos.</p>";

echo "<hr>";

echo "<h2>Caso 2: Tentativa de Login com E-mail Inválido</h2>";
$nameTypedInvalidEmail = "Pdro";
$emailTypedInvalidEmail = "pedro@email";
$passwordTypedInvalidEmail = "Senha123";
$resultInvalidEmail = $manager->login($nameTypedInvalidEmail, $emailTypedInvalidEmail, $passwordTypedInvalidEmail);
echo $resultInvalidEmail ? "<p>Login realizado com sucesso!</p>" : "<p>Nome, email ou senha incorretos.</p>";
echo "<p>Nota: A validação de e-mail é a primeira a falhar, retornando falso.</p>";

echo "<hr>";

echo "<h2>Caso 3: Tentativa de Login com Senha Incorreta</h2>";
$nameLoginError = "João Silva";
$emailLoginError = "joao@email.com";
$passwordLoginError = "Errada123";
$resultLoginError = $manager->login($nameLoginError, $emailLoginError, $passwordLoginError);
echo $resultLoginError ? "<p>Login realizado com sucesso!</p>" : "<p>Nome, email ou senha incorretos.</p>";

echo "<hr>";

echo "<h2>Caso 4: Reset de Senha Válido</h2>";
$idReset = 1;
$newPassword = "NovaSenha1";
$resultReset = $manager->resetPassword($idReset, $newPassword);
echo "<p>" . $resultReset . "</p>";

echo "<hr>";

?>