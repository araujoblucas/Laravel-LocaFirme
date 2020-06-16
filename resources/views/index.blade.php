


    @component('layouts.header', [
        'userName' => $userName,
        'title' => $title
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



    <div class="containerSearch">
        <form action="{{ route('search') }}">
            <input name="search" class="ls-select" />
            <select name="typeSearch" class="ls-select">
                <option value="name">Nome</option>
                <option value="genre">Genero</option>
            </select>
            <button type="submit">Pesquisar</button>
        </form>
    </div>

    <div class="containerFlex">
        @foreach ($movies as $movie)
            <div class="box-info">
                <header>

                    <h3 class="title-box-info {{ $movie->available <= 0 ? 'ico-cancel-circle' : 'ico-checkmark'}} ">

                        {{ $movie->name}}
                        <small>{{ $movie->genre}}, {{ $movie->year }}</small>
                    </h3>
                    @if($movie->available <= 0)
                        <a class="btn btn-danger f-right">Indisponível</a>
                    @else
                        <a href="{{route('addToCar', $movie->id) }}" class="btn btn-primary f-right">Alugar</a>
                    @endif
                </header>
                <div class="divImgFlex"><img class="imgFlex" src="{{ $movie->image }}" alt=""></div>
                <div class="box-info-grid row-fluid">
                    <div class="col-md-3">
                        <span class="title-box">Likes</span>
                        <strong class="value-box">{{ $movie->likes}}</strong>
                        <br>

                        @php $like = false @endphp
                        @foreach ($user_likes as $user_like)
                            @if ($user_like == $movie->id )
                                @php $like = true @endphp
                            @endif
                        @endforeach


                        <a href="
                        {{ $like ? route('removeLike', $movie->id) : route('giveLike', $movie->id)}} ">
                        <span aria-hidden="true" class="{{ $like ? '' : 'inactive' }} ico-thumbs-up"></span></a>



                    </div>
                    <div class="col-md-8 txt-left">
                        {{$movie->info}}

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="center">
        {{ $movies->links() }}
    </div>

</body>

<style>
    .containerFlex {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        margin: 30px
    }
    .box-info {
        width: 30vw;
    }

    .imgFlex {
        margin-left: 5vw;
        width: 20vw;
    }
    .divImgFlex{
        display: flex;
        width:30vw;
    }
    .txt-left {
        font-size: 12px;
    }
    .inactive {
        opacity: .5 !important;
    }
    .center {
        display: flex;
        width:100%;
        justify-content: center;
    }
    .containerSearch{
        display: flex;
        justify-content: flex-end;
        flex-wrap: wrap;
        margin-right: 30px;
        margin: 30px;

    }
</style>
