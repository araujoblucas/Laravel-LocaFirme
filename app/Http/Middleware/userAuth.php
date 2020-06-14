<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class userAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::check()) {
            session()->put('messageType', "aviso");
            session()->put('message', "Você precisa estar logado para fazer isso");
            return redirect()->route('home');
        }
        return $next($request);
    }
}
