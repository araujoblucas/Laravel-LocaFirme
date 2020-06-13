


    @component('layouts.header', [
        'userName' => $userName,
        'title' => $title
    ])
    @endcomponent
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
</style>
