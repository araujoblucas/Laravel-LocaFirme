
    @component('layouts.headerAdmin',
    [
        'title' => $title,
        'userName' => $userName
    ])
    @endcomponent

    @if(session()->has('message'))
    <div class="container" style="margin-top: 15px">
        @if(session()->get('messageType') == "erro")
            <div class="alert alert-danger">{{ session()->pull('message') }}</div>
        @elseif(session()->get('messageType') == "aviso")
            <div class="alert alert-warning"><b>Puxa vida!</b> {{ session()->pull('message') }}</div>
        @else
            <div class="alert alert-success"><b>Aí sim!</b> {{ session()->pull('message') }}</div>
        @endif
    </div>
    @php session()->forget('messageType') @endphp
    @endif


    <div class="containerMovie">

        <h1 style="text-justify: center; text-align: center;">Filmes</h1>
        <br><br>

        <table class="table">
            <thead>
                <td class="centralize">Id do Filme</td>
                <td >Nome</td>
                <td class="centralize">Estréia</td>
                <td class="centralize">Quantidade</td>
                <td class="centralize">Disponíveis</td>
                <td class="centralize">Editar</td>
                <td class="centralize">Remover</td>
            </thead>

        @foreach ($movies as $movie)
            <tr>
                <td class="centralize">{{ $movie->movie_id }}</td>
                <td>{{ $movie->name }}</td>
                <td class="centralize">{{ $movie->year }}</td>
                <td class="centralize">{{ $movie->qnt }}</td>
                <td class="centralize">{{ $movie->available }}</td>
                <td class="centralize"><a href="{{route('updateMovieView', $movie->movie_id)}}" class="ico-pencil"> </a>
                <td class="centralize"><a href="{{route('deleteMovie', $movie->movie_id)}}" class="ico-remove"> </a>
            </tr>
        @endforeach
        </table>
    </div>
    </body>

    <style>
        .containerMovie {
            width: 80vw;
            margin-top:5vh;
            margin-left:10vw;
            display: flex;
            flex-direction: column;
            align-self: center;
            justify-self: center;
            justify-content: center;
            justify-items: center
        }
        .centralize {
            text-justify: center; text-align: center;
        }
    </style>
