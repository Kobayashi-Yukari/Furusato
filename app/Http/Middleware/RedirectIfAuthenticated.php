<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{   //config/appで定義
    private const GUARD_USER = 'user';
    private const GUARD_ADMIN = 'admin';
    private const GUARD_PRODUCER = 'producer';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // $guards = empty($guards) ? [null] : $guards;
        // //Authのガードでチェックしてログインしてたらリダイレクト
        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }
        //もしuserとして認証してるか、またはuser関連のURLなら
        if(Auth::guard(self::GUARD_USER)->check()&& $request->routeIs('user.*')){
            return redirect(RouteServiceProvider::HOME);
        }

        if(Auth::guard(self::GUARD_ADMIN)->check()&& $request->routeIs('admin.*')){
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }

        if(Auth::guard(self::GUARD_PRODUCER)->check()&& $request->routeIs('producer.*')){
            return redirect(RouteServiceProvider::PRODUCER_HOME);
        }

        return $next($request);
    }
}