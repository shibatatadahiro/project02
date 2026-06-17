<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            回答一覧表示画面
            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8" style="max-width: 1000px;">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <p class="text-lg font-semibold mb-6">コメント</p>

                @forelse ($answers as $answer)
                    <div class="border-b pb-4 mb-6">

                        {{-- 上段：左に名前・日付・評価、右に編集・削除 --}}
                        <div class="flex justify-between items-start">

                            {{-- 左側：名前・日付・評価 --}}
                            <div>
                                <p class="font-semibold">
                                    お名前：{{ $answer->user->name }}
                                    <span class="text-gray-500 text-sm">
                                        （{{ $answer->created_at->format('Y/m/d') }}）
                                    </span>
                                </p>

                                <p class="mt-1">
                                    評価：{{ $answer->evaluation }}
                                </p>
                            </div>

                            {{-- 右側：編集・削除 --}}
                            <div class="flex gap-3">
                                <a href="{{ route('answers.edit', $answer->id) }}"
                                   class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                    編集
                                </a>

                                <form method="POST" action="{{ route('answers.destroy', $answer->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition"
                                            onclick="return confirm('削除しますか？')">
                                        削除
                                    </button>
                                </form>
                            </div>

                        </div>

                        {{-- コメント --}}
                        <p class="mt-3 break-words">
                            {!! nl2br(e($answer->comment)) !!}
                        </p>

                    </div>

                @empty
                    <p class="text-center text-gray-600 py-10 text-lg">
                        データがありません
                    </p>
                @endforelse
                
                {{-- 回答フォームへ --}}
                <div class="text-center mt-10">
                    <a href="{{ route('answer.form') }}" class="text-blue-600 underline text-lg">
                        回答フォームへ
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
