<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            // 認証されていなければログイン画面へリダイレクト
            // プロジェクトのログインルート名に合わせて調整してください
            return redirect()->route('login');
        }

        return $next($request);
    }
}
