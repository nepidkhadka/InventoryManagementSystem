<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleWare
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
            if(Auth::user()->role == '1'){
                    return $next($request);
            }else{
                return redirect('/nopermission')->with('messsage', 'Access Denied, Contact Your Admin For Permission');
            }
        }else{
            return redirect('/login')->with('messsage', 'Log In');
        }
        return $next($request);
    }
}
