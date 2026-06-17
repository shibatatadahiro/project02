<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;

class AdminController extends Controller
{
    /**
     * 管理者ダッシュボード
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * 集計・一覧表示
     */
    public function answers()
    {
        // 全ユーザーの回答を取得
        $answers = Answer::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        // 評価の集計
        $counts = [
            5 => Answer::where('evaluation', 5)->count(),
            4 => Answer::where('evaluation', 4)->count(),
            3 => Answer::where('evaluation', 3)->count(),
            2 => Answer::where('evaluation', 2)->count(),
            1 => Answer::where('evaluation', 1)->count(),
        ];

        return view('admin.answers', compact('answers', 'counts'));
    }

    /**
     * 削除確認画面
     */
    public function deleteConfirm(Answer $answer)
    {
        return view('admin.answers_delete_confirm', compact('answer'));
    }

    /**
     * 削除実行
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();

        return redirect()
            ->route('admin.answers.index')
            ->with('success', '削除しました。');
    }
}
