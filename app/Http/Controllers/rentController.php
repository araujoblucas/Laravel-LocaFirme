<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class rentController extends Controller
{
    public function rent() {
        if(!Auth::check()) {
            session()->put('messageType', "aviso");
            session()->put('message', "Precisa estar logado para finalizar meu parça");
            return redirect()->route('userLogin');
        }

        $user = auth()->user()->id;
        $cart = session()->get('cart')->items;
        $today = now();
        $deliveryDay = Carbon::now()->addDay(3);
        $count = 0;
        $sucessCounter = 0;


        foreach ( $cart as $item) {
            $count++;
            $stock = DB::table('stock')
                ->where('movie_id', '=', $item->id)
                ->first();

            if($stock->available < 0) {
                return redirect()->route('home');
            } else {
                DB::table('stock')->where('movie_id', '=', $item->id)
                ->decrement('available');
                DB::table('stock')->where('movie_id', '=', $item->id)
                ->increment('rented');

                $idRents = DB::table('rents')->insertGetId(
                    [
                        'user_id' => $user,
                        'movie_id' => $item->id,
                        'status' => "Alugado",
                        'rentDate' => $today,
                        'returnDate' => $deliveryDay
                ]);

                if($idRents) {
                    $sucessCounter++;
                }
            }
        }
        if($sucessCounter == $count){
            session()->put('messageType', 'sucesso');
            session()->put('message', "Valeu pela confiança!");
        }
        session()->forget('cart');
        return redirect()->route('home');
    }

    public function returnMovie($rentID) {
        DB::table('stock')->where('movie_id', '=', $rentID)
        ->increment('available');
        DB::table('stock')->where('movie_id', '=', $rentID)
        ->decrement('rented');

        DB::table('rents')
            ->where('id', '=', $rentID)
            ->update(['status' => "devolvido"]);
            session()->put('messageType', 'sucesso');
            session()->put('message', "Devolvido!");
        return redirect()->route('userProfile');
    }


}
