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

    .imgLike {
        opacity: 0.3;
        width:32px !important;
        height:32px !important;
        border: solid #000 2px;
    }
    .active {
        opacity: 1;
    }
</style>




<body>
    <div class="header">
        Bem vindo {{ $dados }},

        @guest
            <form class="login" method="POST" action="{{ route('user_login') }}">
                <input type="text" name="email" placeholder="Usuario">
                <input type="text" name="password" placeholder="Senha">
                <button type="submit">Entrar</button>
            </form>
        @endguest
        @auth
            <a href="">Alugados</a>
            <a href="{{ route('user_logout') }}">Sair</a>
        @endauth

        <span>{{ session()->has('cart') and session()->get('cart')->totalQnt > 0 ? session()->get('cart')->totalQnt : '' }}</span>
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
        @if($movie->available > 0)
            <button><a href="{{ ($movie->available <= 0) ? "#" : route('addToCar', $movie->id) }}" >Alugar</a></button>
        @endif
        {{ $like = false}}
        @foreach ($user_likes as $user_like)
            @if ($user_like == $movie->id )
                @php $like = true @endphp
            @endif
        @endforeach

        <a href="
        {{ $like ? route('removeLike', $movie->id) : route('giveLike', $movie->id)}} ">
            <img class="imgLike
                {{ $like ? 'active' : '' }}
            " src="https://png.pngtree.com/png-clipart/20190516/original/pngtree-vector-like-icon-png-image_4013523.jpg">
        </a>


        </div>

    @endforeach
    </div>
</body>

@if(session()->has('message'))
    <script>
        alert( "{{ session()->pull('message') }}");
    </script>
@endif
