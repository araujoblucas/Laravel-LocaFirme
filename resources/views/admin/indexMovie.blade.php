<!DOCTYPE html>
<head>

    <title>Editar</title>
</head>

<style>

    table td {
        text-align: center;
        padding: 15px;
    }
    table tr{
        border: solid 2px #000;
        background-color: #999;
    }
    table tr:nth-child(even) {
        background-color: #ccc;
    }
</style>


<body>
    <h1> Editar </h1>

    <table class="table">
        <thead>
            <td>Id do Filme</td>
            <td>Nome</td>
            <td>ano</td>
            <td>Quantidade</td>
            <td>Disponíveis</td>
            <td>Editar</td>
        </thead>

    @foreach ($movies as $movie)
        <tr>
            <td>{{ $movie->movie_id }}</td>
            <td>{{ $movie->name }}</td>
            <td>{{ $movie->year }}</td>
            <td>{{ $movie->qnt }}</td>
            <td>{{ $movie->available }}</td>
            <td><a href="{{route('updateMovieView', $movie->movie_id)}}">Editar</a>
        </tr>
    @endforeach
    </table>
</body>
