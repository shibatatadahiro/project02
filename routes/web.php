<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/answers', [\App\Http\Controllers\Admin\AdminController::class, 'answers'])
        ->name('admin.answers');
});

// 管理者ログイン画面
Route::get('/admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])
    ->name('admin.login.form');

// 管理者ログイン処理
Route::post('/admin/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])
    ->name('admin.login');

require __DIR__.'/auth.php';
