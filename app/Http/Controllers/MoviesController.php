<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\movie;
use App\cart;
use Illuminate\Contracts\Session\Session;

class MoviesController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $dados = auth()->user()->name;
        } else {
            $dados = "Visitante";
        }


        $movies = DB::table('movies')
        ->join('stock', 'movies.id', '=', 'stock.movie_id')
        ->select('movies.*', 'stock.qnt', 'stock.available')->get();

        return view('index', ['movies' => $movies, 'dados' => $dados]);
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

}
