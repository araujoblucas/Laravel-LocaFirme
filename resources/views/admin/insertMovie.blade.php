
    @component('layouts.headerAdmin',
    [
        'title' => $title,
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

    <div class="containerCreateMovie">
        <h1>Adicionar Filme:</h1>
        <form method="POST" action="{{ route('createMovie') }}">
            <fieldset>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control"  name="name" placeholder="Insira o nome do filme">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="exampleInputEmail1">Sinopse</label>
                        <textarea class="form-control" name="info" style="resize: vertical !important;" rows="3"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3">
                        <label for="image">Imagem</label>
                        <input type="text" class="form-control" name="image" placeholder="Insira o link da imagem">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="genre">Genero</label>
                        <input type="text" class="form-control" name="genre" placeholder="Insira os seus generos separados por ',' aqui">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="year">Estréia</label>
                        <input type="text" class="form-control" name="year" placeholder="Insira o ano de lançamento aqui">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="quantidade">Estoque</label>
                        <input type="text" class="form-control" name="qnt" placeholder="Insira a quantidade no estoque">
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
