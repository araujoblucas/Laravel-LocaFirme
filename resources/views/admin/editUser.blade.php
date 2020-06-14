
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


    <div class="containereditUser">
        <h1>Editar Filme:</h1>
        <form method="post" action="{{ route('updateUser', $user->id) }}">
            <fieldset>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" name="name" placeholder="Insira o nome do filme">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" name="email" placeholder="Insira o link da imagem">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="role">Função</label>
                        <select name="role" class="ls-select form-control">
                            @if( $user->role == "admin" )
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            @else {
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            }
                            @endif
                          </select>
                    </div>
                </div>
                <div class="box-actions">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </fieldset>
        </form>

<style>
    .containereditUser {
        width: 60vw;
        margin-left: 20vw;
        margin-top: 5vh;


    }
</style>

</body>
