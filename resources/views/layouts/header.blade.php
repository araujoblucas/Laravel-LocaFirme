<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/2.0.6/stylesheets/locastyle.css">
    <script async="" src="//www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>

<!-- HEADER -->
<header class="header" role="banner">
    <div class="container">
        <span class="control-menu visible-xs ico-menu-2"></span>
        <span class="control-sidebar visible-xs ico-list"></span>
        <h1 class="project-name"><a href="{{route('home')}}">LocaFirme</a></h1>

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
            <li><a href="#" class="active ico-cart" role="menuitem">{{ session()->has('cart') and session()->get('cart')->totalQnt > 0 ? session()->get('cart')->totalQnt : '' }}</a>
                <ul>
                    <li><a href="{{route('listCart')}}">Finalizar Compra</a></li>
                    <li><a href="{{route('listCart')}}">Ver Carrinho</a></li>
                    <li><a href="{{ route('forgetCart') }}">Largar Carrinho</a></li>
                </ul>
            </li>
            <li><a href="#" role="menuitem">Lista de contatos</a></li>
            <li><a href="#" role="menuitem">Mensagens</a>

            </li>
            <li><a href="#" role="menuitem">Campanhas</a></li>
            <li><a href="#" role="menuitem">Templates</a></li>
            <li><a href="#" role="menuitem">Relatórios</a></li>
            <li><a href="#" role="menuitem">Configurações</a></li>
        </ul>
    </menu>
</div>
<!-- FIM DO MENU PRINCIPAL -->
