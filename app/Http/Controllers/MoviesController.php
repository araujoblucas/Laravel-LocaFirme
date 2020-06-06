<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index() {
        $movies = DB::table('movies')
        ->join('stock', 'movies.id', '=', 'stock.movie_id')
        ->select('movies.*', 'stock.qnt', 'stock.available')->get();

        return view('index', ['movies' => $movies]);
    }


}
