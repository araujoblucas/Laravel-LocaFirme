<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\movie;
use App\stock;

class adminController extends Controller
{

    public function adminLogin() {
        if(Auth::check()){
            if(auth()->user()->role == "admin"){
               return redirect()->route('indexMovieView');
            }
        }
        return view('admin.login');
    }

    public function adminLoginPost(Request $request) {
        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            session()->put('messageType', 'erro');
            session()->put('message', 'Dados Incorretos');
            return redirect()->route('adminLogin');
        }

        $user = DB::table('users')->where('email', '=', $request->email)->first();
        if($user->role != 'admin') {
            session()->put('messageType', 'aviso');
            session()->put('message', 'Você não é um administrador!');
            return redirect()->route('adminLogin');
        }
        return redirect()->route('adminLogin');
    }

    public function createView(){
        $sucess = null;
        $userName = auth()->user()->name;
        $title = "Admin - Adicionar Filme";
        return view('admin.insertMovie', ['sucess' => $sucess, 'userName' => $userName, 'title' => $title]);
    }

    public function create(Request $request) {
        $idMovie = DB::table('movies')->insertGetId(
            [
             'name' => $request->name,
             'info' => $request->info,
             'image' => $request->image,
             'genre' => $request->genre,
             'year' => $request->year,
            ],
        );

        $sucess = DB::table('stock')->insertGetId(
            [
                'qnt' => $request->qnt,
                'movie_id' => $idMovie,
                'available' => $request->qnt,
                'rented' => 0
            ],
        );
        if($sucess && $idMovie){
            session()->put('messageType', 'sucesso');
            session()->put('messageType', 'Olha só, mais um filme no nosso acervo o/');
        }
        return redirect()->route('indexMovieView');
    }

    public function indexView(){
        $userName = auth()->user()->name;
        $pageTitle = "Admin - Filmes";
        $movies = DB::table('movies')
            ->join('stock', 'movies.id', '=', 'stock.movie_id')->get();
         return view('admin.indexMovie', ['movies' => $movies, 'userName' => $userName, 'title' => $pageTitle]);
    }

    public function updateView($id) {
        $userName = auth()->user()->name;
        $title = "Admin - Adicionar Filme";
        $movie = DB::table('movies')
            ->join('stock', 'movies.id', '=', 'stock.movie_id')
            ->where('movies.id', '=', $id)
            ->select('movies.*', 'stock.qnt')
            ->first();
        return view('admin.editMovie', ['movie' => $movie, 'userName' => $userName, 'title' => $title]);

    }

    public function update(Request $request, $id) {
         $affected = DB::table('movies')->where('id', '=', $id)->update(
             [
                 'name' => $request->name,
                 'info' => $request->info,
                 'image' => $request->image,
                 'genre' => $request->genre,
                 'year' => $request->year,
             ],
         );

         $idStock = DB::table('stock')
             ->where('movie_id', '=', $request->id)
             ->select('id', 'available', 'qnt')->first();

         $available = ($request->qnt - $idStock->qnt)+ $idStock->available;
         ($available < 0) ? $available = 0 : $available = $available;


         DB::table('stock')->where('id', '=', $idStock->id)->update(
             [
                 'qnt' => $request->qnt,
                 'available' => $available
             ]
         );


        return redirect()->route('indexMovieView');
    }

    public function delete($id) {
        DB::table('movies')->where('id', '=', $id)->delete();

        session()->put('messageType', 'sucesso');
        session()->put('message', 'Finalmente deletamos esse filme... ufa!');
        return redirect()->route('indexMovieView');
    }

    public function listLikes() {
        $title = "Lista de Likes";
        $userName = auth()->user()->name;
        $movies = DB::table('movies')
            ->join('stock', 'movies.id', '=', 'stock.movie_id')
            ->orderBy('movies.likes', 'desc')
            ->get();

        $likes = DB::table('likes')
            ->join('users', 'likes.user_id', '=', 'users.id')
            ->get();


        return view('admin.listLikes',
            [
                'title' => $title,
                'userName' => $userName,
                'movies' => $movies,
                'likes'=> $likes
        ]);
    }
    public function listUsers() {
        $title = "Lista de Likes";
        $userName = auth()->user()->name;
        $users = DB::table('users')->get();
        return view('admin.listUsers', [
            'title' => $title,
            'userName' => $userName,
            'users' => $users
        ]);
    }

    public function editUserView($id) {
        $user = DB::table('users')->where('users.id', '=', $id)->first();
        $title = "Editar usuário {$user->name}" ;
        $userName = auth()->user()->name;

        return view('admin.editUser', [
            'title' => $title,
            'userName' => $userName,
            'user' => $user
        ]);
    }

    public function updateUser(Request $request, $id) {
        $affected = DB::table('users')->where('id', '=', $id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email
        ]);
        session()->put('messageType', 'sucesso');
        session()->put('message', 'Dados Atualizados!');
        return redirect()->route('listUsers');
    }

    public function deleteUser($id){
        $rents = DB::table('rents')->where('user_id', '=', $id)->get();

        foreach($rents as $rent){
            DB::table('stock')->where('id', '=', $rent->movie_id)->increment('available');
            DB::table('stock')->where('id', '=', $rent->movie_id)->decrement('rented');
        }
        DB::table('rents')->where('user_id', '=', $id)->update(['status' => 'devolvido']);

        DB::table('likes')->where('user_id', '=', $id)->delete();

        $delete = DB::table('users')->where('id', '=', $id)->delete();
        session()->put('messageType', 'sucesso');
        session()->put('message', 'Usuário Deletado!');
        return redirect()->route('listUsers');

    }
}



