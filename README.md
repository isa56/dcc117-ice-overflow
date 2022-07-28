# DCC117 - 2022.1 - Trabalho Modelagem de Sistemas

| **Sumário** |
|-------------|
| [Autores](#autores) |
| [Especificação do Trabalho](#especificação-do-trabalho) |
| [Deploy](#deploy) |
| [Instruções para Rodar o Projeto](#instruções-para-rodar-o-projeto) |
| [Como Utilizar o Sistema](#como-utilizar-o-sistema) |


## Autores

- Professor da Disciplina: [Fabrício Mendonça](http://professorfabriciomendonca.com.br/);

- [Daniel Freitas - 202065118](https://github.com/dfreita4s);
- [Gabriel Frasson - 202035001](https://github.com/GFrasson);
- [Gabriel Gomes Bahia - 202035028](https://github.com/GabrielBahia);
- [Isadora Gonçalves Ferreira - 202035017](https://github.com/isa56/);
- [João Pedro Ferreira - 202076009](https://github.com/Jo1oPedro).

## Especificação do Trabalho

- Front End feito em [Vue.JS](https://vuejs.org/), com as dependências [Vue Router](https://router.vuejs.org/);
- Back End feito em [Laravel](https://laravel.com/);

## Deploy
[![Netlify Status](https://api.netlify.com/api/v1/badges/8cceed40-c377-48c0-b8b6-a7a57de7e152/deploy-status)](https://app.netlify.com/sites/ice-overflow/deploys)

O Front End está disponível para acesso em [ice-overflow.netlify.app](ice-overflow.netlify.app).

## Instruções para Rodar o Projeto

### Front End em Vue:
\* É necessário ter o _node_ e o _npm_ instalados.

1. Abra o Terminal na Pasta do Projeto;
2. Entre na pasta _frontend-vue_: `cd frontend-vue`;
3. Instale as dependências necessárias: `npm install`;
4. Rode o comando: `npm run serve`;
5. Carregue o Link: [http://localhost:8080/](http://localhost:8080/);
6. Utilize o sistema conforme indicado em [Como Utilizar o Sistema](#como-utilizar-o-sistema).

### Back End em Laravel:
\* É necessário ter o _PHP 8+_ e o _Laravel 9_ instalados.
1. Abra o Terminal na Pasta do Projeto;
2. Entre na pasta _backend-laravel_: `cd backend-laravel`;
3. Atualize as dependências: `composer update`;
4. Instale as dependências necessárias: `composer install`;
5. Instale o npm com npm install e depois npm run dev;
6. Crie uma key com php artisan key:generate. A key servira para as hashes;
7. Crie um banco de dados com o nome de laravel;
8. Rode o comendo php artisan migrate --seed para rodar as migrations e semear o banco;
9. Rode o comando php artisan storage:link para linkar a pasta de storage com a pasta public;
5. Rode o comando: `php artisan serve` para iniciar o servidor;

## Objetivos de Software
 O ICE Overflow é um sistema desenvolvido para criar um ambiente virtual onde é possível a comunicação entre os estudantes, monitores e professores do Instituto de Ciências Exatas, da Universidade Federal de Juiz de Fora. Isso ocorre através de perguntas e respostas em um sistema de fórum baseado no Stack Overflow, conhecido software da área de computação. Nessa plataforma, qualquer usuário cadastrado pode publicar uma dúvida para ser respondida pelos outros membros do site. As melhores respostas são votadas pela comunidade e exibidas com destaque na página da questão.

 ## Como Utilizar o Sistema
Na página inicial do fórum é possível realizar login/cadastro no site ou apenas vizualizar os posts que já existem, existe a opção também de pesquisar por posts ou filtrar os posts por disciplinas. É necessário criar um conta de usuário no sistema para poder realizar as funcionalidades de interação no fórum. 
Para o cadastro de usuário, será aberta uma página de cadastro com um formulário onde é necessário informar o nome, o nome de usuário, email e uma senha. Cada usuário possui uma página de perfil onde são exibidos seu nome, descrição e os posts que ele já criou no fórum. Um usuário pode criar posts no fórum, realizar comentários nos posts, marcar como melhor resposta um comentário que foi realizado em seu post e upvotes em comentários. Além disso, o usuário também tem a opção de apagar seus próprios posts e seus próprios comentários apenas. 
Para realizar login no fórum, é aberta uma página de login onde é solicitado o email e a senha do usuário.
Para a criação de um post é necessário que o usuário logado acesse a página de criar posts e digite o título e a descrição do post, podendo também selecionar em qual disciplina esse post se enquadra. 
Para criar comentários ou realizar upvote é necessário que o usuário logado entre em um post específico e crie o comentário através de um modal existente nessa página e, para o upvote, basta clicar no ícone de curtida. 
Para realizar a remoção de post basta que o usuário logado entre em seu próprio post que deseja apagar e clique no ícone de lixeira. 
Para realizar a remoção de comentário basta que o usuário logado entre no post em que ele criou este comentário e clique no ícone de lixeira.
No sistema também existe um usuário administrador que fará a moderação do fórum, este possui a permissão de apagar qualquer post e qualquer comentário, onde essas funcionalidades são aplicadas da mesma maneira que o usuário faz pra realizar a remoção de um post ou de um comentário.

