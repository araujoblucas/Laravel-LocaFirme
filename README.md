<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Características do LocaFirme

Esse projeto foi criado e desenvolvido para aprendizado do Laravel, framework de php.
Este projeto tem as seguintes características:

-   Para controle de likes em abas e não ter problema de dar dois likes, fiz um condicional que quando você curte ou já curte algo muda o botão para um “dislike”, caso mande um like em cada aba, ele vai ignorar a segunda chamada e retornar a index.
-	As contas admin, podem alugar filmes e fazer tudo que um “user” comum pode.
-	Três tipos de usuários: 
    -	Convidado (não logado): podem colocar filmes no carrinho;
    -	Users: podem colocar itens no carrinho, dar likes, listar filmes alugados, editar algumas informações da conta;
    -	Admin: podem listar e editar usuários, podem remover, adicionar, editar e listar filmes, podem também ver os likes de cada filme;
-	Só pode ter uma unidade de cada filme no carrinho


## Algumas coisas que me chamaram a atenção ou que eu aprendi com este projeto

-   Na index.blade, descobri o @auth e @guest, que são “partes” ou seções do código que só aparecerão seus conteúdos para um usuário que estiver logado ou não estiver logado “convidado”, isso ajuda muito na organização e legibilidade do código.
-	Foram criadas migrations e seeds, para o banco de dados utilizei o Laragon.
-	Foi criado um schedule que executa um comando que verifica se a data de entrega é no dia atual e se for, ele atualiza o status para devolvido, e incrementa no banco a disponibilidade e decrementa o número de alugados.
-	A verificação de logado e se o logado é admin, é feito através de middlewares, uma chamada userAuth que verifica se está logado, e quando é requerido a autorização de admin, é usada a adminAuth que verifica se o usuário é um admin.
-	Para as páginas com filtros e ordenação dos filmes, como por exemplo, “comedia”, “mais curtidos”, “horror”, todas utilizam a mesma página index(como um Template) onde o que muda é a rota que chama uma função que passa parâmetros diferentes para o frontend.
-	Para a construção do front eu utilizei o Locaweb Style, documentação ótima e com componentes bem bacanas, segue o [link](http://opensource.locaweb.com.br/locawebstyle/)
-   Descobri o heroku e coloquei o projeto lá, adicionei os add-ons clearDB e Herolu Postgres. [Link para o Projeto no Heroku](https://locafirme.herokuapp.com/)
