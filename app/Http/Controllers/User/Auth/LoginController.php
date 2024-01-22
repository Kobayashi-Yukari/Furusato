<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Guardの認証方法を指定
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }

    /**
     * ログイン画面
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        
        Auth::guard('user')->logout();

        return $this->loggedOut($request);
        // $this->guard('user')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // if ($response = $this->loggedOut($request)) {
        //     return $response;
        // }

        // return $request->wantsJson()
        //     ? new JsonResponse([], 204)
        //     : redirect('/');
    }

    /**
     * ログアウト後のリダイレクト先の指定
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        return redirect(route('user.login'));
    }

}
