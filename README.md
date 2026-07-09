# Projeto de gerenciamento de um DB estilo spotify

## O que ele faz?
Voce pode adicionar remover e criar albuns, musicas e artistas. Albuns pertencem a artistas e musicas pertencem a albuns

## Dependências
- [php](https://www.php.net/downloads.php?os=windows&osvariant=windows-native&version=default)
- [composer](https://getcomposer.org/download/)
- [node](https://nodejs.org/en/download) (busque o instalador .msi)

## Como iniciar?

```sh
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```


## Organização de pasta
```sh
/app -> Coração da aplicação, onde ficar a maior parte do código e a lógica de negócios
    -> /Http/Controllers -> Arquivos de controller, mantém os métodos que são chamados nas rotas.0
    -> /Models -> pasta com os modelos ORM das entidades da apicação 
/bootstrap -> motor de inicialização do sistema
/config -> parametros de configuração da aplicação
/database -> migrations e configurações de banco de dados
/node_modules -> Dependências do node
/public -> arquivos públicos
/routes -> Rotas da aplicação
    -> /web.php -> Rotas da aplicação web, registram páginas e rotas de processamento.
/resources -> Guarda Views, arquivos de estilo em JavaScript
    -> /views/ -> pasta com as views, componentes e layouts
/vendor -> Dependências do PHP/composer

```
