<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\movie;
use App\stock;

class adminController extends Controller
{

    public function createView(){
        $sucess = null;
        return view('admin.insertMovie', ['sucess' => $sucess]);
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
        return view('admin.insertMovie', ['sucess' => $sucess]);
    }

    public function indexView(){
        $movies = DB::table('movies')
            ->join('stock', 'movies.id', '=', 'stock.movie_id')->get();
         return view('admin.indexMovie', ['movies' => $movies]);
    }

    public function updateView($id) {
        $movie = DB::table('movies')
            ->join('stock', 'movies.id', '=', 'stock.movie_id')
            ->where('movies.id', '=', $id)
            ->select('movies.*', 'stock.qnt')
            ->first();
        return view('admin.editMovie', ['movie' => $movie]);

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
}
