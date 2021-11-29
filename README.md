# Agenda de Contatos

Sistema desenvolvido como teste para vaga de Desenvolvedor Full Stack na SHIPSMART

### Tecnologias Utilizadas
- Framework Backend: Laravel 8
- Framework JavaScript: VueJS
- Framework CSS: Bootstrap (Biblioteca bootstrap-vue)
- Banco de Dados Relacional: MySQL

## Instruções para Instalação

Link do Repositório
```
https://github.com/marcellowb/agenda.git
```

- Após baixar o o projeto do repositório, executar os comandos

```
composer install
npm install
```

- Configurar as credenciais do banco de dados (mysql) no arquivo .env
- Executar o comando para configuração da chave do Laravel

```
php artisan key:generate
```

- Executar o comando para criação do banco de dados (migrations seeds)

```
php artisan migrate --seed
```

Executar o projeto

```
Servidor Web: php artisan serve
Servidor NPM: npm run dev
```

