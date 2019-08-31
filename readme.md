
Tresle API
==============


Instalação
----------

OBS: Para a execução do projeto é necessário que tenho instalado, mysql, php 7.3 e composer. 

 1) Baixar a última versão: [https://github.com/treslebr/laravel-api/releases](https://github.com/treslebr/laravel-api/releases)
 2) Descompactar o projeto.
 3) Acessar o projeto pelo terminal. 
 4) Executar `composer install`
 5) Criar um banco de dados (Ex: tresle)
 6) Renomear o arquivo **.env.example** (localizado na raiz do projeto) para **.env**
 7) Acessar o arquivo .env e inserir as suas configurações do banco de dados 
 

    DB_CONNECTION=mysql
    
    DB_HOST=127.0.0.1
    
    DB_PORT=3306
    
    DB_DATABASE=tresle
    
    DB_USERNAME=root
    
    DB_PASSWORD=

Executar no terminal:

8) `php artisan migrate`
9) `php artisan db:seed`
10) `php artisan key:generate`
11) `php artisan passport:install`
12) `php artisan serve`

Utilizando a API no Postman
=============




Principais funcionalidades
=============
| Funcionalidades       | Pull Request |
|-----------------------|--------------|
| Categoria do produto     |#[1]([https://github.com/treslebr/laravel-api/pull/1](https://github.com/treslebr/laravel-api/pull/1))              |
| Categoria dos produtos adicionais   | #[2]([https://github.com/treslebr/laravel-api/pull/2](https://github.com/treslebr/laravel-api/pull/2))          |
| Produtos adicionais       | #[10]([https://github.com/treslebr/laravel-api/pull/3](https://github.com/treslebr/laravel-api/pull/10))          |
| Produto | #[11]([https://github.com/treslebr/laravel-api/pull/11](https://github.com/treslebr/laravel-api/pull/11))           |
| Autenticação de usuário  | #[16](https://github.com/treslebr/laravel-api/pull/16)          |
| Clientes   | #[18]([https://github.com/treslebr/laravel-api/pull/18](https://github.com/treslebr/laravel-api/pull/18))          |
| Endereços do cliente                 | #[20](https://github.com/treslebr/laravel-api/pull/20)          |
| Frete                 | #[24](https://github.com/treslebr/laravel-api/pull/24)          |
| Carrinho de compras                 | #[26](https://github.com/treslebr/laravel-api/pull/26)          |
| Pedidos                 | #[28](https://github.com/treslebr/laravel-api/pull/28)          |

**Mais Pull Requests finalizados:**  [Clique aqui](https://github.com/treslebr/laravel-api/pulls?q=is%3Apr+is%3Aclosed)
