    @component('layouts.header', [
        'userName' => $userName,
        'title' => "Seu carrinho"
    ])

    @endcomponent


    </div>
    @if( session()->has('cart') )
    <div style="display: flex; flex-direction: column; width: 17vw; position: absolute;">
        <a href="{{ route('rent') }}" class="btn btn-success f-left" style="margin-left: 5vw; margin-top: 30px;">Finalizar Aluguel</a>
        <a href="{{ route('home') }}" class="btn btn-warning f-left" style="margin-left: 5vw; margin-top: 30px;">Voltar as Compras</a>
        <a href="{{ route('forgetCart') }}" class="btn btn-danger f-left" style="margin-left: 5vw; margin-top: 30px;">Esquecer Carrinho</a>
    </div>
    <div class="containerCart">
    @foreach (session()->get('cart')->items as $movie)
        <div class="ls-list">
            <header class="ls-list-header">
                <div class="ls-group-actions">
                    <a href="{{route('removeOfCart', $movie->id) }}" class="btn btn-danger f-left">Tirar do carrinho</a>
                </div>
                <div class="ls-list-image"><img width="48" height="48" src="{{ $movie->image}}"></div>
            		<div class="ls-list-title">
                    <a href=""> {{ $movie->name }}</a>
                    <small>{{$movie->year}}, {{$movie->genre}} </small>
                </div>
            </header>
        </div>

    @endforeach

    </div>










    @else
        <div class="containerNoCart">
            <h1>Não há itens no carrinho</h1>
        </div>
    @endif

</body>

@if(session()->has('message'))
    <script>
        alert( "{{ session()->pull('message') }}");
    </script>
@endif


<style>
    .containerNoCart {
        display: flex;
        margin-top: 40px;
        justify-content: center;
        justify-items: center;
    }
    .containerCart {
        width: 50vw;
        margin-left: 25vw;
        margin-top: 40px;
    }

</style>
