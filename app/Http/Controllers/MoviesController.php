<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\movie;
use App\cart;
use App\likes;


class MoviesController extends Controller
{
    public function index() {
        $movies = DB::table('movies')
        ->join('stock', 'movies.id', '=', 'stock.movie_id')
        ->select('movies.*', 'stock.qnt', 'stock.available')->get();
        $likes = array();
        if (Auth::check()) {
            $userName = auth()->user()->name;
            $allLikes = DB::table('likes')
            ->where('user_id', '=', auth()->user()->id)
            ->select('movie_id')->get();

            foreach ($allLikes as $like) {
                $likes[] = $like->movie_id;
            }
        } else {
            $userName = "Visitante";
        }


        return view('index', [
            'movies' => $movies,
            'userName' => $userName,
            'user_likes' => $likes]);
    }

    public function postLogin(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('home');
        }
    }

    public function logout(){
    	Auth::logout();
    	return redirect()->route('home');
    }


    public function addToCar(Request $request, $id){
        $movie = movie::find($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new cart($oldCart);
        $cart->add($movie, $id);

        $request->session()->put('cart', $cart);

        session()->put('message', "Filme Adicionado ao carrinho!");
        return redirect()->route('home');
    }

    public function listCart(Request $request){
        if (Auth::check()) {
            $dados = auth()->user()->name;
        } else {
            $dados = "Visitante";
        }
        return view('list_cart', ['dados' => $dados]);
    }

    public function removeCart(Request $request, $id){
        $movie = movie::find($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new cart($oldCart);
        $cart->remove($movie, $id);

        $request->session()->put('cart', $cart);

        session()->put('message', "Removido com sucesso ao carrinho!");
        return redirect()->route('listCart');
    }
    public function buy_cart(){
        if (Auth::check()) {
            $dados = auth()->user()->name;
        } else {
            $dados = "Visitante";
        }
        return view('buy_cart', ['dados' => $dados]);
    }

    public function giveLike($movie_id){
        $user_id = auth()->user()->id;
        $like = DB::table('likes')
        ->where([
            ['movie_id', '=', $movie_id],
            ['user_id', '=', $user_id],
            ]
        )->exists();

        if( $like ) {
            return redirect()->route('home');
        }

        $like_id = DB::table('likes')->insertGetId(
                [
                 'movie_id' => $movie_id,
                 'user_id' => $user_id,
                ]
            );
            DB::table('movies')->where('id', '=', $movie_id)->increment('likes');

            session()->put('message', "Filme curtido!");
            return redirect()->route('home');
        }

    public function removeLike($movie_id){
        $user_id = auth()->user()->id;

        DB::table('likes')
        ->where([
            ['movie_id', '=', $movie_id],
            ['user_id', '=', $user_id],
            ]
        )->delete();

        DB::table('movies')->where('id', '=', $movie_id)->decrement('likes');

        session()->put('message', "Filme descurtido!");
        return redirect()->back();
    }
    public function forgetCart () {
        session()->forget('cart');
        return redirect()->back();
    }
}

