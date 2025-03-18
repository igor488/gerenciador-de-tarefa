# 📌 Gerenciador de Tarefas - Laravel

![Laravel Logo](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

Este é um sistema de gerenciamento de tarefas desenvolvido com **Laravel**, **MySQL**, **HTML, CSS e JavaScript puro**. O projeto possui um design moderno e profissional, garantindo uma ótima experiência ao usuário.  

---

## 📖 Sumário
- [📌 Sobre o Projeto](#-sobre-o-projeto)
- [🛠 Tecnologias Utilizadas](#-tecnologias-utilizadas)
- [🚀 Funcionalidades](#-funcionalidades)
- [📂 Estrutura do Projeto](#-estrutura-do-projeto)
- [💾 Banco de Dados (MySQL)](#-banco-de-dados-mysql)
- [⚡ Como Rodar o Projeto](#-como-rodar-o-projeto)
- [🧐 Conceitos Importantes do Laravel](#-conceitos-importantes-do-laravel)
- [📜 Licença](#-licença)

---

## 📌 Sobre o Projeto
Este projeto é um **Gerenciador de Tarefas** que permite:
✅ Criar, editar e excluir tarefas  
✅ Listar todas as tarefas cadastradas  
✅ Design responsivo e agradável  
✅ Backend robusto usando **Laravel**  
✅ API padronizada com **API Resource**  

O MySQL foi escolhido como banco de dados por sua praticidade e integração no Linux.

---

## 🛠 Tecnologias Utilizadas
- **Laravel 12**
- **PHP 8.3**
- **MySQL**
- **Eloquent ORM**
- **HTML, CSS e JavaScript**
- **Blade Templates**
- **Migrations & Seeds**
- **API Resource**

---

## 🚀 Funcionalidades
- **CRUD de Tarefas** (Criar, Listar, Atualizar, Excluir)
- **Validações no Backend**
- **API para comunicação com o Frontend**
- **Banco de Dados estruturado via Migrations**
- **Seeds para popular a base de dados**
- **Design Responsivo**

---

## 📂 Estrutura do Projeto
```
/app
  /Http
    /Controllers
      - TaskController.php
  /Models
    - Task.php
/database
  /migrations
  /seeders
/public
  /css
    - style.css
/routes
  - web.php
  - api.php
```

---

## 💾 Banco de Dados (MySQL)
1. **Criação da base de dados**  
   ```sql
   CREATE DATABASE gerenciador_tarefas;
   ```
2. **Configurar `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=gerenciador_tarefas
   DB_USERNAME=root
   DB_PASSWORD=sua_senha
   ```
3. **Rodar as Migrations**
   ```bash
   php artisan migrate
   ```
4. **Popular a base com dados fictícios**
   ```bash
   php artisan db:seed
   ```

---

## ⚡ Como Rodar o Projeto
1️⃣ **Clone o repositório**
   ```bash
   git clone https://github.com/gerenciador-de-tarefa.git
   ```
2️⃣ **Acesse a pasta do projeto**
   ```bash
   cd gerenciador-tarefas
   ```
3️⃣ **Instale as dependências**
   ```bash
   composer install
   ```
4️⃣ **Crie o arquivo `.env`**
   ```bash
   cp .env.example .env
   ```
5️⃣ **Configure o banco de dados no `.env`** (veja seção acima)  
6️⃣ **Gere a chave do Laravel**
   ```bash
   php artisan key:generate
   ```
7️⃣ **Rode as Migrations**
   ```bash
   php artisan migrate
   ```
8️⃣ **Inicie o servidor**
   ```bash
   php artisan serve
   ```
🔹 O sistema estará rodando em **http://127.0.0.1:8000**

---

## 🧐 Conceitos Importantes do Laravel

### 1️⃣ O que são Service Providers e para que servem?
Os **Service Providers** no Laravel são a espinha dorsal da inicialização do framework. Eles servem para **registrar serviços**, como conexões de banco de dados, rotas, validações e configurações.

📌 Exemplo:  
No arquivo `AppServiceProvider.php`, você pode definir configurações globais, como um **Observer** para modelos:
```php
use App\Models\Task;
use App\Observers\TaskObserver;

public function boot()
{
    Task::observe(TaskObserver::class);
}
```

---

### 2️⃣ Diferença entre hasOne e hasMany no Eloquent ORM
- **hasOne**: Define um relacionamento de **um para um**.
- **hasMany**: Define um relacionamento de **um para muitos**.

📌 Exemplo:
```php
class User extends Model {
    public function profile() {
        return $this->hasOne(Profile::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
```

---

### 3️⃣ O que é Dependency Injection no Laravel?
**Dependency Injection** (Injeção de Dependências) é um padrão que permite passar dependências diretamente para classes/métodos, ao invés de criá-las dentro deles.

📌 Exemplo no **Controller**:
```php
public function __construct(TaskRepository $taskRepository) {
    $this->taskRepository = $taskRepository;
}
```
Aqui, o Laravel injeta automaticamente a dependência `TaskRepository`.

---

### 4️⃣ O que é Middleware e um exemplo de uso?
O **Middleware** intercepta requisições para processar algo **antes** ou **depois** da resposta.

📌 Exemplo de **Middleware de autenticação**:
```php
public function handle($request, Closure $next) {
    if (!auth()->check()) {
        return redirect('/login');
    }
    return $next($request);
}
```

---

### 5️⃣ Como funcionam as migrações e suas vantagens?
As **migrations** servem para **controlar a estrutura do banco de dados** via código.

📌 Criando uma Migration:
```bash
php artisan make:migration create_tasks_table
```
📌 Vantagens:
✅ Controle de versão  
✅ Compartilhamento entre equipe  
✅ Automação da estrutura do banco  

---

### 6️⃣ O que é Queue no Laravel e quando usá-lo?
As **Queues** permitem processar tarefas em segundo plano, como envio de e-mails e notificações.

📌 Criando uma fila:
```bash
php artisan queue:work
```
✅ Melhora a performance  
✅ Evita lentidão no sistema  

---

### 7️⃣ Diferença entre API Resource e um Controller Tradicional
- **Controller Tradicional**: Retorna dados diretamente.
- **API Resource**: Formata os dados de forma padronizada.

📌 Exemplo de **API Resource**:
```php
class TaskResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status
        ];
    }
}
```

---

## 📜 Licença
Este projeto é open-source e está licenciado sob a licença **MIT**.
