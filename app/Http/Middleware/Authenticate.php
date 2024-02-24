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
    protected $producer_route = 'producer.login';
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
        if (!$request->expectsJson()) {
            //もしproducer関連のURLじゃなかったら$owner_routeへ飛ばす
            if(Route::is('producer.*')){
                //$this->で上のプロパティ呼び出し
                return route($this->producer_route);
                //admin関連のURLでなかったらadminへ飛ばす
            } elseif(Route::is('admin*')){
                return route($this->admin_route);
            } else {
                return route($this->user_route);
            }
        }
    }

}
