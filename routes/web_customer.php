<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\Auth\LoginController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\Auth\ForgotPasswordController;
use App\Http\Controllers\Customer\Auth\ResetPasswordController;

    // ログイン認証関連
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // パスワード再設定
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

    // ログイン認証後

    // TOPページ
    Route::get('/home', [HomeController::class, 'home'])->name('home');