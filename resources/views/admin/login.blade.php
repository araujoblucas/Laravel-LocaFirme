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
    <title>Login</title>
</head>
<body>
    <form method="get" action="{{ route('home') }}">
        <button class="btn  ico-direction-left ico-pos-left" style="position: absolute; left:30px; top:30px" type="submit">Voltar</button>
    </form>
    <div class="container">

        <div class="box-parent-login" style="width:40vw">
            <div class="well bg-white box-login">
                <h1 class="ls-login-logo">LocaFirmeAdmin
                </h1>
                <form method="POST" action="{{ route('adminLoginPost') }}">
                    <fieldset>

                    @if(session()->has('message'))
                        @if(session()->get('messageType') == "erro")
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                                <p><strong>Deu ruim!</strong> {{ session()->pull('message') }}</p>
                            </div>
                        @elseif(session()->get('messageType') == "aviso")
                            <div class="alert alert-warning alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                                <p><strong>Puxa vida!</strong> {{ session()->pull('message') }}</p>
                            </div>
                        @else
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
                                <p><strong>Aí sim!</strong> {{ session()->pull('message') }}</p>
                            </div>
                        @endif
                    @php session()->forget('messageType') @endphp
                    @endif

                        <div class="form-group ls-login-user">
                            <label for="email">E-mail</label>
                            <input class="form-control ls-login-bg-user input-lg" type="text" name="email" placeholder="Usuário">
                        </div>

                        <div class="form-group ls-login-password">
                            <label for="password">Senha</label>
                            <input class="form-control ls-login-bg-password input-lg" type="password" name="password" placeholder="Senha">
                        </div>

                        <input type="submit" value="Entrar" class="btn btn-primary btn-lg btn-block">

                    </fieldset>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<style>
    .container {
        display: flex;
        width: 100vw;
        height: 100vh;
        align-items: center;
        justify-content: center;
        justify-items: center;
        align-self: center;
        justify-items: center;
    }
</style>
