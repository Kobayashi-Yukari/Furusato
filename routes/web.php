<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 開発中ログイン(ユーザー)
Route::get('user_dev_login', function () {
    abort_unless(app()->environment('local'), 403);
    auth()->guard('user')->login(App\Models\User::first());
    return to_route('user.home');
})->name('user_dev_login');

Route::get('user_dev_login_id/{id}', function ($id) {
    abort_unless(app()->environment('local'), 403);
    auth()->guard('user')->login(App\Models\User::find($id));
    return to_route('user.home');
})->name('user_dev_login_id');