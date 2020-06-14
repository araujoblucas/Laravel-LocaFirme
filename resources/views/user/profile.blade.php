
    @component('layouts.header', [
        'title' => "Profile",
        'userName' => $userName

    ])
    @endcomponent

    @if(session()->has('message'))
        <div class="container" style="margin-top: 15px">
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
        </div>
    @php session()->forget('messageType') @endphp
    @endif

        <div class="containerContent">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#first-tab" data-toggle="tab">Listar Filmes</a></li>
                <li ><a href="#second-tab" data-toggle="tab">Listar Likes</a></li>
                <li ><a href="#third-tab" data-toggle="tab">Editar o Perfil</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active in" id="first-tab">


                @foreach ($rents as $rent)

                    <div class="ls-list">
                        <header class="ls-list-header">
                            <div class="ls-group-actions">

                                @if( strtolower($rent->status) == "devolvido" )
                                    <a href="" class="btn btn-primary f-left">Devolvido</a>
                                @elseif( strtolower($rent->status) == "alugado" )
                                    <a href="" class="btn btn-success f-left">Alugado</a>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Assistir</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ route('returnMovie', $rent->id) }}" class="color-danger">Devolver</a></li>
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <div class="ls-list-image"><img alt="{{ $rent->name }}" width="48px" height="48px" src="{{ $rent->image }}"></div>
                            <div class="ls-list-title">
                                <a href="">{{ $rent->name }}</a>
                                <small>{{  $rent->year }}, {{  $rent->genre }}</small>
                            </div>
                        </header>
                        <div class="ls-list-content ">
                            <div class="col-xs-6 col-md-6">
                                <strong class="ls-list-label">Data de locação:</strong>
                                {{ date('Y-M-d', strtotime($rent->rentDate)) }}
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <strong class="ls-list-label">Data de devolução:</strong>
                                {{ date('Y-M-d', strtotime($rent->returnDate)) }}
                            </div>
                        </div>
                    </div>

                @endforeach
                </div>



                <div class="tab-pane " id="second-tab">

                @foreach ($likedMovies as $likedMovie)

                    <div class="ls-list">
                        <header class="ls-list-header">
                            <div class="ls-group-actions">
                                <a href="{{ route('removeLike', $likedMovie->id) }}" class="btn btn-danger ico-thumbs-up-2">Tirar Gostei</a>
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


                    <form method="POST" action="{{route('userUpdate', auth()->user()->id)}}">
                        <fieldset>
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" name="name" placeholder="Insira seu nome aqui">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" placeholder="Insira seu email aqui">
                            </div>

                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" name="password" placeholder="Insira sua senha aqui">
                            </div>
                            <div class="box-actions">
                                <button type="submit" class="btn btn-default">Enviar</button>
                            </div>
                        </fieldset>
                    </form>


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
