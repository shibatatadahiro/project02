<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // 回答フォーム
    Route::get('/answer', [AnswerController::class, 'form'])->name('answer.form');
    Route::post('/answer', [AnswerController::class, 'store'])->name('answer.store');

    // 回答一覧
    Route::get('/answers', [AnswerController::class, 'index'])->name('answers.index');

    // 編集
    Route::get('/answers/{answer}/edit', [AnswerController::class, 'edit'])->name('answers.edit');
    Route::put('/answers/{answer}', [AnswerController::class, 'update'])->name('answers.update');

    // 削除
    Route::delete('/answers/{answer}', [AnswerController::class, 'destroy'])->name('answers.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {

    // 管理者ダッシュボード
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    // 集計・一覧表示
    Route::get('/admin/answers', [AdminController::class, 'answers'])
        ->name('admin.answers.index');

    // ★ 削除確認画面（今回必要なルート）
    Route::get('/admin/answers/{answer}/delete', [AdminController::class, 'deleteConfirm'])
        ->name('admin.answers.deleteConfirm');

    // 削除実行
    Route::delete('/admin/answers/{answer}', [AdminController::class, 'destroy'])
        ->name('admin.answers.destroy');
});


// 管理者ログイン画面
Route::get('/admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])
    ->name('admin.login.form');

// 管理者ログイン処理
Route::post('/admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])
    ->name('admin.login');

require __DIR__.'/auth.php';
