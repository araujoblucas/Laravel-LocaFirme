
    @component('layouts.headerAdmin',
    [
        'title' => $title,
        'userName' => $userName
    ])
    @endcomponent




    <div class="containerMovie">

        <h1 style="text-justify: center; text-align: center;">Usuários cadastrados:</h1>
        <br><br>

        <table class="table">
            <thead>
                <td class="centralize">ID</td>
                <td >Nome</td>
                <td class="centralize">Tipo de Usuário</td>
                <td class="centralize">Editar</td>
                <td class="centralize">Remover</td>
            </thead>

        @foreach ($users as $user)
            <tr>
                <td class="centralize">{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td class="centralize" style="text-transform: capitalize">{{ $user->role }}</td>
                <td class="centralize"><a href="{{route('editUserView', $user->id)}}" class="ico-pencil"> </a>
                <td class="centralize"><a href="{{route('deleteUser', $user->id)}}" class="ico-remove"> </a>
            </tr>
        @endforeach
        </table>
    </div>
    </body>

    <style>
        .containerMovie {
            width: 80vw;
            margin-top:5vh;
            margin-left:10vw;
            display: flex;
            flex-direction: column;
            align-self: center;
            justify-self: center;
            justify-content: center;
            justify-items: center
        }
        .centralize {
            text-justify: center; text-align: center;
        }
    </style>
