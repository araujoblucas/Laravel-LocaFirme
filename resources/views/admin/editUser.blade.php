
    @component('layouts.headerAdmin',
    [
        'title' => $title,
        'userName' => $userName
    ])
    @endcomponent

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
