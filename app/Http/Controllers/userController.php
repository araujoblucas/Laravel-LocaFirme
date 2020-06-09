<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\user;
use App\likes;
use App\movies;

class userController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function logout(){
        Auth::logout();
    	return redirect()->route('home');

    }

    public function register() {
        return view('user.register');
    }

    public function registerPost(Request $request) {
        $tryRegister = DB::table('users')->insertGetId(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ],
        );


        if(!$tryRegister) {
            session()->put('message', "Algo muito ruim aconteceu e tu vais ter que fazer tudo novamente. :/");
            return redirect()->route('userRegister');
        }
        session()->put('message', "Bem vindo ao LocaFirme, você é um dos nossos agora!. :D");
        return redirect()->route('userLogin');
    }

    public function profile() {
        if (Auth::check()) {
            $userName = auth()->user()->name;
        } else {
            return redirect()->route('userLogin');
        }
        $likedMovies = DB::table('likes')
            ->join('movies', 'likes.movie_id', '=', 'movies.id')
            ->where('likes.user_id', '=', auth()->user()->id)
            ->select('movies.*')->get();


        return view('user.profile', ['userName' => $userName, 'likedMovies' => $likedMovies]);

    }
}


