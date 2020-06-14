
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


    <div class="containerCreateMovie">
        <h1>Editar Filme:</h1>
        <form method="POST" action="{{ route('updateMovie', $movie->id) }}">
            <fieldset>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" value="{{ $movie->name }}" name="name" placeholder="Insira o nome do filme">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="exampleInputEmail1">Sinopse</label>
                        <textarea class="form-control" name="info"  style="resize: vertical !important;" rows="3">{{ $movie->info }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        <label for="image">Imagem</label>
                        <input type="text" class="form-control" value="{{ $movie->image }}" name="image" placeholder="Insira o link da imagem">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="genre">Genero</label>
                        <input type="text" class="form-control" value="{{ $movie->genre }}" name="genre" placeholder="Insira os seus generos separados por ',' aqui">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="year">Estréia</label>
                        <input type="text" class="form-control" value="{{ $movie->year }}" name="year" placeholder="Insira o ano de lançamento aqui">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="quantidade">Estoque</label>
                        <input type="text" class="form-control" value="{{ $movie->qnt }}" name="qnt" placeholder="Insira a quantidade no estoque">
                    </div>
                </div>
                <div class="box-actions">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </fieldset>
        </form>

<style>
    .containerCreateMovie {
        width: 60vw;
        margin-left: 20vw;
        margin-top: 5vh;


    }
</style>

</body>
