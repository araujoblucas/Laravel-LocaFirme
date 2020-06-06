<!DOCTYPE html>
<head>
</head>

<body>
    @if ($sucess)
    <script type="text/javascript">
        window.onload = function(){
            alert("Criado com sucesso!");
        }
    </script>

    @endif

    <form method="POST" action="{{ route('createMovie') }}">
        {{csrf_field()}}
        <h1>Filme:</h1>
        <input name="name" placeholder="name" />
        <input name="info" placeholder="info" />
        <input name="image" placeholder="image" />
        <input name="genre" placeholder="genre" />
        <input name="year" placeholder="year" />



        <h1>Estoque:</h1>
        <input name="qnt" placeholder="quantidade" />
        <button type="submit">Adicionar</button>





</body>
