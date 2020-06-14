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
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form method="get" action="{{ route('userLogin') }}">
            <button class="btn  ico-direction-left ico-pos-left" style="position: absolute; left:30px; top:30px" type="submit">Voltar</button>
        </form>
        <div class="box">
            <form method="POST" action="{{ route('userRegisterPost') }}">
                <fieldset>
                    <h1>Registre-se</h1>
                    <div class="form-group">
                        <label for="name">Nome de Usuário</label>
                        <input type="text" class="form-control" name="name" placeholder="Insira seu texto aqui">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Insira seu texto aqui">
                    </div>

                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" name="password" placeholder="Senha">
                    </div>

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

                    <div class="box-actions">
                        <button type="submit" class="btn btn-default">Enviar</button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</body>

<style>
    .container{
        display: flex;
        width: 100vw;
        height: 100vh;
        align-items: center;
        justify-content: center;
        justify-items: center;
        align-self: center;
        justify-items: center;
    }
    .box {
        width:50vw;
        border:
    }
</style>
</html>
