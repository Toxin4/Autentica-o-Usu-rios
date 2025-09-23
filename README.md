# Autenticação de Usuários - Desing Patterns e Clean Code
### *Vinicius da Silva Gomes - 2010424 | Miguel Guarnetti - 1999154*
----
## 🤔 Instruções para Execução
1. Instale o **XAMPP** (Caso não tenha instalado)
2. Execute o **XAMPP** e inicie o **APACHE**
3. Copie o projeto para a pasta 'htdocs' do XAMPP - *Exemplo:* C:\xampp\htdocs
4. Acesse no navegador: (http://localhost/Autenticacao-Usuarios)
----
## 💡 Funcionalidades
- Cadastro de usuários
- Verificação de cadastro
- Cadastro verificando e não permitindo emails inválidos
- Login com verificação de email não permitindo duplicatas
----
## 📈 Regras de Negócio
**Cadastro de Usuário**
- Um usuário deve possuir obrigatoriamente:
  - Nome completo.
  - Email válido e único no sistema.
  - Senha que atenda aos critérios de segurança.
- O email deve ser validado com formato correto (nome@dominio.com).
- A senha deve conter:
  - Mínimo de 8 caracteres.
  - Pelo menos 1 letra maiúscula, 1 minúscula e 1 número.
**Login**
- O login só é permitido se:
  - O email existe no sistema.
  - A senha fornecida corresponde exatamente à senha cadastrada.
**Validação de Dados**
- Nenhum campo pode estar vazio no cadastro ou login.
- Emails duplicados não são permitidos.
**Gerenciamento de Usuários**
- Responsável por autenticar usuários.
- Deve utilizar o Validator para validar entradas antes de qualquer ação.
- Não pode autenticar diretamente sem passar pela validação.
- Projeto foca apenas em cadastro simples, validação e login.
----
## ⚠️ Limitações
- Atualmente não existe banco de dados.
- Usuários e credenciais podem estar definidos em memória.
- Os dados não são salvos permanentemente.
- Não existe sistema de sessões (o login não é persistido entre páginas).  
----
## 🧮 Casos de Uso
**Caso 1 - Cadastro válido** 
- Entrada: `nome: Maria Oliveira`, `email: maria@email.com`, `senha: Senha123`.
- Resultado esperado: `"usuário cadastrado com sucesso"`.

**Caso 2 - Cadastro com e-mail inválido** 
- Entrada: `nome Pedro`, `email pedro@@email`, `senha Senha123`.
- Resultado esperado: mensagem de erro → `“E-mail inválido”`.

**Caso 3 - Tentativa de login com senha errada**
- Entrada: `email: joao@email.com`, `senha: Errada123`.
- Resultado esperado: mensagem de erro → `“Credenciais inválidas”`.

**Caso 4 - Reset de senha válido**
- Entrada: `id: 1`, `nova senha: NovaSenha1`.
- Resultado esperado: A senha é alterada.

**Caso 5 - Cadastro de usuário com e-mail duplicado**
- Entrada: email já existente no array.
- Resultado esperado: mensagem de erro → `“E-mail já está em uso”`.
