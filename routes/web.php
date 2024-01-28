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

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 開発中ログイン(user)
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

// 開発中ログイン(admin)
Route::get('admin_dev_login', function () {
    abort_unless(app()->environment('local'), 403);
    auth()->guard('admin')->login(App\Models\Admin::first());
    return to_route('admin.home');
})->name('admin_dev_login');

Route::get('admin_dev_login_id/{id}', function ($id) {
    abort_unless(app()->environment('local'), 403);
    auth()->guard('admin')->login(App\Models\Admin::find($id));
    return to_route('admin.home');
})->name('admin_dev_login_id');

// 開発中ログイン(producer)
Route::get('producer_dev_login', function () {
    abort_unless(app()->environment('local'), 403);
    auth()->guard('producer')->login(App\Models\Producer::first());
    return to_route('producer.home');
})->name('producer_dev_login');

Route::get('producer_dev_login_id/{id}', function ($id) {
    abort_unless(app()->environment('local'), 403);
    auth()->guard('producer')->login(App\Models\Producer::find($id));
    return to_route('producer.home');
})->name('producer_dev_login_id');