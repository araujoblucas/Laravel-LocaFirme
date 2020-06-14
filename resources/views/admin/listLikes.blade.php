
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

    <div class="containerMovie">

        <h1 class="centralize">Os mais curtidos</h1>
        <br><br>

        <table class="table">
            <thead>
                <td class="centralize">Id do Filme</td>
                <td >Nome</td>
                <td class="centralize"><b>Likes</b></td>
                <td class="centralize">Quantidade</td>
                <td class="centralize">Disponíveis</td>
                <td class="centralize">Ver likes</td>
            </thead>

    @foreach ($movies as $movie)

                 {{-- MODAL PARA LIKES --}}
        @foreach ($movies as $modalMovie)


            <div class="modal fade" id="myModal{{$modalMovie->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4>Likes do {{$modalMovie->name}}</h4>
                        </div>
                        <div class="modal-body">
                                @foreach ($likes as $like)
                                    @if( $like->movie_id == $modalMovie->id )
                                        <li>{{ $like->name}}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

            <tr>

                <td class="centralize">{{ $movie->movie_id }}</td>

                <td>{{ $movie->name }}</td>
                <td class="centralize"><b>{{ $movie->likes }}</b></td>
                <td class="centralize">{{ $movie->qnt }}</td>
                <td class="centralize">{{ $movie->available }}</td>

                <td class="centralize"><a data-toggle="modal" href="#myModal{{ $movie->movie_id }}" class="ico-eye"></a>

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
