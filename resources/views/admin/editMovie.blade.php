<!DOCTYPE html>
<head>

    <title>Editar</title>
</head>

<body>

    <h1> Editar </h1>
    <form method="post" action="{{ route('updateMovie', $movie->id ) }}">
        {{ method_field('PUT') }}
        <h1>Filme:</h1>
        <input name="name" value="{{ $movie->name }}" />
        <input name="info" value="{{ $movie->info }}" />
        <input name="image" value="{{ $movie->image }}" />
        <input name="genre" value="{{ $movie->genre }}" />
        <input name="year" value="{{ $movie->year }}" />

        <h1>Estoque:</h1>
        <input name="qnt" value="{{ $movie->qnt }}" />
        <button type="submit">Adicionar</button>

    </form>



</body>
