<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\Auth\ForgotPasswordController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\SurveyAnswerController;
use App\Http\Controllers\User\PasswordController;

// 全ルートに二重送信防止処理
// Route::middleware(['check.multi.submit'])->group(function () {
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
    // Route::middleware(['auth:user'])->group(function () {

    //     // TOPページ
        Route::get('/home', [HomeController::class, 'home'])->name('home');
    //     // パスワード変更
    //     Route::get('passwords/edit', [PasswordController::class, 'edit'])->name('passwords.edit');
    //     Route::patch('passwords', [PasswordController::class, 'update'])->name('passwords.update');

    //     Route::middleware(['check.user.project.access'])->group(function () {

    //         // プロジェクトごとのTOPページ
    //         Route::get('/projects/home', [HomeController::class, 'projectHome'])->name('projects.home');

    //         // 全体レポートダウンロード
    //         Route::get('survey_answers/total_report_download_show', [SurveyAnswerController::class, 'totalReportDownloadShow'])->name('survey_answers.total_report_download_show');
    //         Route::get('survey_answers/total_report_download', [SurveyAnswerController::class, 'totalReportDownload'])->name('survey_answers.total_report_download');
    //         // 全体レポートを別枠で開く
    //         Route::get('survey_answers/total_report_target_blank/{fileName}', [SurveyAnswerController::class, 'totalReportTargetBlank'])->name('survey_answers.total_report_target_blank');

    //         // 回答
    //         // slidePackダウンロード
    //         Route::get('survey_answers/{survey_answer}/slide_pack_download', [SurveyAnswerController::class, 'slidePackDownload'])->name('survey_answers.slide_pack_download');
    //         // 個人レポート（.xlsx）ダウンロード
    //         Route::get('survey_answers/{survey_answer}/excel_report_download', [SurveyAnswerController::class, 'excelReportDownload'])->name('survey_answers.excel_report_download');
    //         // 上司の部下回答一覧
    //         Route::get('survey_answers/buka', [SurveyAnswerController::class, 'indexForZyoshiBuka'])->name('survey_answers.index_for_zyoshi_buka');

    //         // 上司回答一覧: controller名はindexForZyoshi
    //         Route::get('survey_answers/zyoshi', [SurveyAnswerController::class, 'indexForZyoshi'])->name('survey_answers.index_for_zyoshi');
    //         // 上司回答作成
    //         Route::get('survey_answers/zyoshi/create', [SurveyAnswerController::class, 'createForZyoshi'])->name('survey_answers.create_for_zyoshi');
    //         // 上司回答編集
    //         Route::get('survey_answers/zyoshi/{survey_answer}/edit', [SurveyAnswerController::class, 'editForZyoshi'])->name('survey_answers.edit_for_zyoshi');
    //         // 上司回答更新: controller名はupdateForZyoshi
    //         Route::put('survey_answers/zyoshi/{survey_answer}', [SurveyAnswerController::class, 'updateForZyoshi'])->name('survey_answers.update_for_zyoshi');
    //         Route::resource('survey_answers', SurveyAnswerController::class);
    //     });
    // });
// });