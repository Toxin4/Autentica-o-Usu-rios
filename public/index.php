<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/User.php';

use App\UserManager;

$manager = new UserManager();

$nomeDigitado = "Maria Oliveira";
$emailDigitado = "maria@email.com";
$senhaDigitada = "Senha123";

$resultado = $manager->verificarLogin($nomeDigitado, $emailDigitado, $senhaDigitada);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Status do Login</h1>
    <p>
        <?= $resultado ? "✅ Login realizado com sucesso!" : "❌ Nome, email ou senha incorretos." ?>
    </p>

    <h2>Logs:</h2>
    <pre><?= print_r($manager->getLogs(), true) ?></pre>
</body>
</html>