# Autenticação de Usuários - Desing Patterns e Clean Code
### *Vinicius da Silva Gomes - 2010424 | Miguel Guarnetti - 1999154*
----
## 🖥 Instruções para Execução
1. Instale o **XAMPP** (Caso não tenha instalado)
2. Execute o **XAMPP** e inicie o **APACHE**
3. Copie o projeto para a pasta 'htdocs' do XAMPP - *Exemplo:* C:\xampp\htdocs
4. Acesse no navegador: (http://localhost/carrinho)
----
## ⚙ Funcionalidades Implementadas
-  
- 
- 
- 
- 
----
## 📊 Regras de Negócio
- 
- 
- 
- 
----
## 🛑 Limitações
- 
- 
- 
----
## 🚧 Casos de Uso
**Caso 1 - Cadastro válido** 
- Entrada: nome Maria Oliveira, email maria@email.com, senha Senha123.
- Resultado esperado: usuário cadastrado com sucesso.

**Caso 2 - Cadastro com e-mail inválido** 
- Entrada: nome Pedro, email pedro@@email, senha Senha123.
- Resultado esperado: mensagem de erro → “E-mail inválido”.

**Caso 3 - Tentativa de login com senha errada**
- Entrada: email joao@email.com, senha Errada123.
- Resultado esperado: mensagem de erro → “Credenciais inválidas”.

**Caso 4 - Reset de senha válido**
- Entrada: id 1, nova senha NovaSenha1.
- Resultado esperado: id 1, nova senha NovaSenha1.

**Caso 5 - Cadastro de usuário com e-mail duplicado**
- Entrada: email já existente no array.
- Resultado esperado: mensagem de erro → “E-mail já está em uso”.
