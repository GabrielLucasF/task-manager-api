# Task Management Api
Este é o componente backend de um aplicativo de gerenciamento de tarefas desenvolvido utilizando Laravel. Ele fornece APIs RESTful para gerenciar tarefas e usuários.

## Funcionalidades

- Autenticação de Usuário (login, registro, logout).
- Operações CRUD para Tarefas (criar, editar, excluir, marcar como concluída).
- Atribuição de Tarefas a Usuários.
- Endpoints de API RESTful para tarefas e usuários.

## Tecnologias Utilizadas

- **Framework**: Laravel 11
- **Autenticação**: JWT (JSON Web Tokens) para autenticação de usuários
- **Banco de Dados**: MySQL
- **API**: APIs RESTful para interação com o frontend do aplicativo

## Instalação
1. Clone o repositório.
2. Instale as dependências:
  ```
composer install
cp .env.example .env
php artisan key
php artisan migrate
  ```

3. Configure as variáveis de ambiente:
- Edite o arquivo `.env` para configurar a conexão com o banco de dados:
  ```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=nome_do_seu_banco
  DB_USERNAME=seu_usuario_do_banco
  DB_PASSWORD=sua_senha_do_banco
  ```

4. Inicie o servidor do Laravel:
  ```
php artisan serve --port=8000
  ```
5. As APIs do backend estarão acessíveis em `http://localhost:8000/api`.

## Endpoints da API

- **POST /api/register**
- Registrar um novo usuário.

- **POST /api/login**
- Autenticar e obter um token JWT.

- **POST /api/logout**
- Invalidar o token JWT e deslogar o usuário.

- **GET /api/tasks**
- Obter tarefas atribuídas ao usuário autenticado.

- **POST /api/tasks**
- Criar uma nova tarefa para o usuário autenticado.

- **PUT /api/tasks/{task}**
- Atualizar uma tarefa (se autorizado).

- **DELETE /api/tasks/{task}**
- Excluir uma tarefa (se autorizado).

- **GET /api/users**
- Obter todos os usuários (acesso de administrador).

- **POST /api/users**
- Criar um novo usuário (acesso de administrador).

- **GET /api/users/{user}**
- Obter detalhes de um usuário específico (acesso de administrador).

- **PUT /api/users/{user}**
- Atualizar detalhes de um usuário (se autorizado).

- **DELETE /api/users/{user}**
- Excluir um usuário (se autorizado).

## Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para enviar pull requests para melhorias ou reportar problemas através de issues no GitHub.

## Licença

Este projeto está licenciado sob a [Licença MIT](https://opensource.org/licenses/MIT).