<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function form()
    {
        return view('answers.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'evaluation' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        Answer::create([
            'user_id' => auth()->id(),
            'evaluation' => $request->evaluation,
            'comment' => $request->comment,
        ]);

        return redirect()->route('answers.index')->with('success', '回答を送信しました。');
    }
    public function index()
    {
        $answers = Answer::with('user')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('answers.index', compact('answers'));
    }

    public function edit(Answer $answer)
    {
        abort_unless($answer->user_id === auth()->id(), 403);
        return view('answers.edit', compact('answer'));
    }

    public function update(Request $request, Answer $answer)
    {
        abort_unless($answer->user_id === auth()->id(), 403);
        $request->validate([
            'evaluation' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $answer->update([
            'evaluation' => $request->evaluation,
            'comment' => $request->comment,
        ]);

        return redirect()->route('answers.index')->with('success', '更新しました。');
    }

    public function destroy(Answer $answer)
    {
        abort_unless($answer->user_id === auth()->id(), 403);
        $answer->delete();
        return redirect()->route('answers.index')->with('success', '削除しました。');
    }

}
