<p align="center">
    <h1 align="center">Desafio Peca Agora</h1>
    <br>
</p>

Yii 2
O Projeto contém os dois desafios acessíveis pelo menu de navegação superior.

Antes de Executar o projeto localmente é necessário certificar que há um banco de dados PostgreSQL instalado e verificar suas credenciais. O projeto está com a conexão padrão do PostgreSQL:

    
    'dsn' => 'pgsql:host=localhost;port=5432;dbname=postgres',
    'username' => 'postgres',
    'password' => '123456',
    

Caso seja necessário alterar a conexão no arquivo:
    pecaagora\config\db.php

REQUIREMENTS
------------
PHP >= 5.6.0.
PostgreSQL > 10 

GUIA DE INSTALAÇÃO
------------

Clonar Repositório
~~~
git clone https://github.com/otavioaufegues/pecaagora.git
~~~

Instalar dependências 
~~~
cd pecaagora
composer install
~~~

Após verificar conexão com banco de Dados
Executar Migrations

*As seguintes extensões do php.ini devem estar habilitadas para executar as migrations
extension=pdo_pgsql
extension=pgsql

~~~
php yii migrate
~~~

*A extensão ";extension=intl" deve estar comentada. Podendo causar erro no desafio 2

Iniciar Servidor da Aplicação
~~~
php yii serve
~~~




DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources
