<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;

class AdminController extends Controller
{
    // 管理者トップ（メニュー）
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // 回答一覧（集計・一覧表示）
    public function answers()
    {
        $answers = Answer::with('user')->get();

        return view('admin.answers', compact('answers'));
    }
}