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

    protected $user_route     = 'user.login';
    protected $admin_route    = 'admin.login';
    protected $producer_route = 'producer.login';
    protected $customer_route = 'customer.login';

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

            //もしproducer関連のURLであれば,producer_routeへ飛ばす
            if(Route::is('producer.*')){
                //$this->で上のプロパティ呼び出し
                return route($this->producer_route);

            //もしcustomer関連のURLであれば,customer_routeへ飛ばす
            } elseif(Route::is('customer*')){
                return route($this->customer_route);

            //もしadmin関連のURLであれば,admin_routeへ飛ばす
            } elseif(Route::is('admin*')){
                return route($this->admin_route);

            } else {
                return route($this->user_route);
            }
        }
    }

}
