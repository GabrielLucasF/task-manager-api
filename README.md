# Task Manager API

API REST de estudo para gerenciamento de tarefas, construída em PHP e Laravel 11. A interface correspondente fica no [Task Manager App](https://github.com/GabrielLucasF/task-manager-app).

## O que explorar

- Cadastro, login e logout com JWT.
- Criação, listagem, atualização e remoção de tarefas.
- Atribuição de tarefas a um usuário responsável.
- Validação dos dados e verificação de criador ou responsável ao editar ou remover uma tarefa.

As [rotas HTTP](routes/api.php) definem o contrato. O [TaskController](app/Http/Controllers/TaskController.php) aplica as validações e regras de acesso. O Eloquent representa os dados e as migrations versionam o esquema.

## Executar localmente

Use PHP 8.2 ou superior, Composer e a extensão PDO para o banco escolhido. O exemplo usa SQLite, padrão do arquivo .env.example. Para MySQL, crie uma base local e preencha DB_CONNECTION=mysql, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME e DB_PASSWORD no .env antes de migrar.

```sh
composer install
cp .env.example .env
touch database/database.sqlite
php artisan key:generate
php artisan jwt:secret --force
php artisan migrate
php artisan serve --port=8000
```

Base local: http://127.0.0.1:8000/api. Gere o segredo JWT somente para o ambiente local.

## Explorar o fluxo

1. Use POST /api/register com name, email, password e password_confirmation. Em seguida, use POST /api/login para obter o token.
2. Envie Authorization: Bearer <token> em POST /api/tasks para criar uma tarefa. Use title e assigned_to com o identificador do usuário de teste.
3. Use GET /api/tasks para listar as tarefas atribuídas ao usuário autenticado.
4. Use PUT /api/tasks/{task} ou DELETE /api/tasks/{task} com o identificador da tarefa criada.

O projeto é um laboratório local. GET /api/public/tasks lista tarefas sem autenticação. Use dados fictícios.

## Testes

Execute php artisan test para rodar os testes de exemplo do projeto.
