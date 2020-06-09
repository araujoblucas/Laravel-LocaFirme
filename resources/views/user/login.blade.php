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
    <div class="container">

        <div class="box-parent-login">
            <div class="well bg-white box-login">
                <h1 class="ls-login-logo">LocaFirme</h1>
                <form method="POST" action="{{ route('user_login') }}">
                    <fieldset>

                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-hidden="true">×</a>
                                <p><strong>Sucesso!</strong> {{ session()->pull('message') }} </a></p>
                            </div>
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
                        <p class="txt-center ls-login-signup">Não possui um usuário na LocaFirme?
                            <a href="{{ route('userRegister') }}">Cadastre-se agora</a>
                        </p>

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
