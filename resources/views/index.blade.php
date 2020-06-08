<!DOCTYPE html>
<head>
</head>


<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .stock{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        padding:20px;
        flex-wrap: wrap;
    }
    .movie{
        border: 2px solid #000000;
        display: flex;
        flex-direction: column;
        align-items: center;

        align-content: center;
        padding: 15px;
        flex-wrap: wrap;
        width: 250px;

    }
    .movie img {
        display: flex;
        width: 180px;
        height: 250px;
        align-self: center;

    }
    .movie h1 {
        text-align: center;
    }
    .movie span {
        color: #333;
        font-weight: 900;
        font-style: italic;
    }
    .movie h4{
        max-width:170px;
        text-align: justify;
        height: auto;
        word-wrap: break-word;
        flex-wrap: wrap;
        overflow: auto;
        font-weight: normal;
        color: rgba(0,0,0, .9)

    }
    .header {
        width: 100vw;
        height: 10vh;
        margin-top: 30px;
        display:flex;
        text-align: center;
        vertical-align: middle;
        align-self: center;
        align-content: center;
        justify-content: center;
    }
    .header span {
        margin-left: 30px;
    }
</style>




<body>
    <div class="header">
        Bem vindo {{ $dados }},

        @if ($dados === "Visitante")
            <form class="login" method="POST" action="{{ route('user_login') }}">
                <input type="text" name="email" placeholder="Usuario">
                <input type="text" name="password" placeholder="Senha">
                <button type="submit">Entrar</button>
            </form>
        @else
            <a href="">Alugados</a>
            <a href="{{ route('user_logout') }}">Sair</a>
        @endif

        <span>{{ session()->has('cart') ? session()->get('cart')->totalQnt : '' }}</span>
        <span><a href="{{route('listCart')}}">List Cart</a></span>

    </div>
    <div class="stock">
     @foreach ($movies as $movie)
        <div class="movie">
            <h1>{{$movie->name}}</h1>
            <img src="{{$movie->image}}" alt="{{$movie->name}}">
            <span>{{$movie->genre}}</span>
            <h4>{{$movie->info}}</h4>

            <span class="disponibilidade">
               {{ ($movie->available <= 0) ? "Não disponível" : "" }}
            </span>
        <button {{ ($movie->available <= 0) ? "disabled" : "" }} ><a href="{{ ($movie->available <= 0) ? "#" : route('addToCar', $movie->id) }}" >Alugar</a></button>

        </div>

    @endforeach
    </div>
</body>

@if(session()->has('message'))
    <script>
        alert( "{{ session()->pull('message') }}");
    </script>
@endif
