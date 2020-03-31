<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        if(Auth::check()){
            $currentUser =Auth::user();
            if($currentUser->role==User::ADMIN){
                return $next($request);
            }
            return redirect()->to('/');
        }
        return redirect()->to('/login');
    }
}
