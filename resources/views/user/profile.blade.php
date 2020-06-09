<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
    <script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
        <!-- HEADER -->
    <header class="header" role="banner">
        <div class="container">
            <span class="control-menu visible-xs ico-menu-2"></span>
            <span class="control-sidebar visible-xs ico-list"></span>
            <h1 class="project-name"><a href="#">LocaFirme</a></h1>

        @auth
            <div class="dropdown hidden-xs">
                <a href="#" data-toggle="dropdown" style="text-transform: capitalize" class="title-b ico-user">{{ $userName }}</a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li><a href="#" role="menuitem">Editar Perfil</a></li>
                    <li><a href="{{ route('user_logout') }}" role="menuitem">Sair</a></li>
                </ul>
            </div>
        </div>
        @endauth
        @guest
        <div class="dropdown hidden-xs">
            <a href="{{ route('userLogin') }}" class="title-box ico-user">Fazer Login</a>
        </div>
        @endguest
    </header>
        <!-- FIM DO HEADER -->

        <!-- MENU PRINCIPAL -->
        <div class="nav-content">
            <menu class="menu">
                <ul class="container">
                    <li><a href="#" class="active ico-cart" role="menuitem">{{ session()->has('cart') and session()->get('cart')->totalQnt > 0 ? session()->get('cart')->totalQnt : '' }}</a></li>
                    <li><a href="#" role="menuitem">Lista de contatos</a></li>
                    <li><a href="#" role="menuitem">Mensagens</a>
                        <ul>
                            <li><a href="#">Enviar</a></li>
                            <li><a href="#">Criar</a></li>
                            <li><a href="#">Editar</a></li>
                            <li><a href="#">Relatórios</a></li>
                        </ul>
                    </li>
                    <li><a href="#" role="menuitem">Campanhas</a></li>
                    <li><a href="#" role="menuitem">Templates</a></li>
                    <li><a href="#" role="menuitem">Relatórios</a></li>
                    <li><a href="#" role="menuitem">Configurações</a></li>
                </ul>
            </menu>
        </div>
        <div class="containerContent">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#first-tab" data-toggle="tab">Listar Filmes</a></li>
                <li><a href="#second-tab" data-toggle="tab">Listar Likes</a></li>
                <li><a href="#third-tab" data-toggle="tab">Editar o Perfil</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane" id="first-tab">


                    <div class="ls-list">
                        <header class="ls-list-header">
                            <div class="ls-group-actions">
                                <a href="#" class="btn btn-primary f-left">Ação principal</a>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Editar</a></li>
                                        <li><a href="#">Adicionar</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#" class="color-danger">excluir</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ls-list-image"><img alt="linux" src="http://developer.locaweb.com.br/assets/edge/img/os/linux.gif"></div>
                            <div class="ls-list-title">
                                <a href="">Identificador</a>
                                <small>Descrição de plano ou caracsterística do produto e recurso <a href="#" class="ico-question" data-container="body" data-inherit="background-color" data-toggle="popover" data-placement="top" data-content="Um texto bem legal e bonito por aqui." data-title="Título" data-original-title="" title=""></a></small>
                            </div>
                        </header>
                        <div class="ls-list-content ">
                            <div class="col-xs-6 col-md-6">
                                <strong class="ls-list-label">Status</strong>
                                Publicado
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <strong class="ls-list-label">Status</strong>
                                Publicado
                            </div>
                        </div>
                    </div>









                </div>



                <div class="tab-pane  active in" id="second-tab">

                @foreach ($likedMovies as $likedMovie)

                    <div class="ls-list">
                        <header class="ls-list-header">
                            <div class="ls-group-actions">
                                <a href="#" class="btn btn-primary f-left">Ação principal</a>
                            </div>
                            <div class="ls-list-image"><img alt="linux" width="48px" height="48px" src="{{  $likedMovie->image }}"></div>
                            <div class="ls-list-title">
                                <a href="">{{  $likedMovie->name }}</a>
                                <small>{{  $likedMovie->year }}, {{  $likedMovie->genre }}</small>
                            </div>
                        </header>
                    </div>
                @endforeach

                </div>



                <div class="tab-pane" id="third-tab">
                    <p>Aqui vai o conteúdo da terceira aba.</p>
                </div>
            </div>
        </div>
</body>
</html>


<style>
    .containerContent {
        margin: 30px;


    }
</style>
