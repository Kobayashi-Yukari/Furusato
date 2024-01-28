<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * @var string
     */
    // protected $user_route  = 'user.login';

    /**
     * @var string
     */
    // protected $admin_route = 'admin.login';

    /**
     * @var string
     */
    // protected $customer_route = 'customer.login';

    protected $user_route = 'user.login';
    protected $owner_route = 'owner.login';
    protected $admin_route = 'admin.login';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return string|null
     */
    protected function redirectTo($request)
    {   //もしリクエストはjsonじゃなかったら
        if (! $request->expectsJson()) {
            //もしowner関連のURLじゃなかったら$owner_routeへ飛ばす
            if(Route::is('owner.*')){
                //$this->で上のプロパティ呼び出し
                return route($this->owner_route);
                //admin関連のURLでなかったらadminへ飛ばす
            } elseif(Route::id('admin*')){
                return route($this->admin_route);
                //ownerでもadminでもなかったらユーザーへ飛ばす
            } else {
                return route($this->user_route);
            }
        }
    }
    // protected function redirectTo(Request $request): ?string
    // {

    //     if (request()->routeIs('admin.*')) {
    //         return $request->expectsJson() ? null : route('admin.login');
    //     }
    //     return $request->expectsJson() ? null : route('login');
    //     // ルーティングに応じて未ログイン時のリダイレクト先を振り分ける
    //     // if (!$request->expectsJson()) {
    //     //     if (Route::is('user.*')) {
    //     //         return route($this->user_route);
    //     //     } elseif (Route::is('admin.*')) {
    //     //         return route($this->admin_route);
    //     //     } elseif (Route::is('customer.*')) {
    //     //         return route($this->customer_route);
    //     //     }
    //     // }
    // }
}
