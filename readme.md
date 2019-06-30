Laravel Agenda
==============

Sistema de agenda desenvolvido com Laravel 5.8 e Twitter BootStrap 3

Instalação
----------

 1) Clonar ou baixar o repositório
 2) Acessar o projeto pelo terminal 
 3) executar `composer install`
 4) Criar um banco de dados (Ex: agenda)
 5) Renomear o arquivo **.env.example** (localizado na raiz do projeto) para **.env**
 6) Acessar o arquivo .env e inserir as suas configurações do banco de dados 
 

    DB_CONNECTION=mysql
    
    DB_HOST=127.0.0.1
    
    DB_PORT=3306
    
    DB_DATABASE=agenda
    
    DB_USERNAME=root
    
    DB_PASSWORD=

Executar no terminal:

7) `php artisan migrate`
8) `php artisan db:seed`
8) `php artisan key:generate`
9) `php artisan serve`

Login
=============

 **E-mail:** admin@gmail.com
 
 **Senha:** admin123


Principais Pull Requests
=============

| Funcionalidades       | Pull Request |
|-----------------------|--------------|
| Cadastrar contato     | #6  #14      |
| Edição dos contatos   | #15          |
| Excluir contato       | #16          |
| Listagem dos contatos | #8           |
| Pesquisa de contatos  | #12          |
| Melhorias no layout   | #18          |
| Login                 | #22          |
