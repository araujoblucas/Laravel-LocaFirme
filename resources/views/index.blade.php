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

</style>




<body>
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
            <button {{ ($movie->available <= 0) ? "disabled" : "" }} >Alugar</button>
        </div>

    @endforeach
    </div>
</body>
