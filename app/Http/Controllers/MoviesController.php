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
            'title' => "Página Inicial",
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

        session()->put('messageType', "sucesso");
        session()->put('message', "Colocamos no teu carrinho já!");
        return redirect()->route('home');
    }

    public function listCart(Request $request){
        if (Auth::check()) {
            $userName = auth()->user()->name;
        } else {
            $userName = "Visitante";
        }
        return view('list_cart', ['userName' => $userName]);
    }

    public function removeCart(Request $request, $id){
        $movie = movie::find($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new cart($oldCart);
        $cart->remove($movie, $id);

        $request->session()->put('cart', $cart);

        session()->put('messageType', "sucesso");
        session()->put('message', "Removido com sucesso ao carrinho!");
        return redirect()->route('listCart');
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
            session()->put('messageType', "sucesso");
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
        session()->put('messageType', "sucesso");
        session()->put('message', "Filme descurtido!");
        return redirect()->back();
    }
    public function forgetCart () {
        session()->forget('cart');
        return redirect()->back();
    }

    public function moreLikesPage() {
        $movies = DB::table('movies')
        ->orderBy('likes', 'desc')
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
            'title' => "Mais curtidos",
            'movies' => $movies,
            'userName' => $userName,
            'user_likes' => $likes]);
    }

    public function comedyMoviesPage() {
        $movies = DB::table('movies')
        ->orderBy('likes', 'desc')
        ->join('stock', 'movies.id', '=', 'stock.movie_id')
        ->where('genre', 'like', '%comedy%')
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
            'title' => "Filmes de Comédia",
            'movies' => $movies,
            'userName' => $userName,
            'user_likes' => $likes]);
    }


    public function horrorMoviesPage() {
        $movies = DB::table('movies')->orderBy('likes', 'desc')
        ->join('stock', 'movies.id', '=', 'stock.movie_id')
        ->where('genre', 'like', '%horror%')
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
            'title' => "Filmes de Terror",
            'movies' => $movies,
            'userName' => $userName,
            'user_likes' => $likes]);
    }
    public function suspenseMoviesPage() {
        $movies = DB::table('movies')
        ->orderBy('likes', 'desc')
        ->join('stock', 'movies.id', '=', 'stock.movie_id')
        ->where('genre', 'like', '%suspense%')
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
            'title' => "Filmes de Suspense",
            'movies' => $movies,
            'userName' => $userName,
            'user_likes' => $likes]);
    }
}

