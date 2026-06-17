<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            削除確認
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8" style="max-width: 1000px;">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <p class="text-lg font-semibold mb-4">
                    以下のコメントを削除しますか？
                </p>

                <div class="border p-4 rounded mb-6 bg-gray-50">
                    <p><strong>お名前：</strong>{{ $answer->user->name }}</p>
                    <p><strong>日付：</strong>{{ $answer->created_at->format('Y/m/d') }}</p>
                    <p><strong>評価：</strong>{{ $answer->evaluation }}</p>
                    <p class="mt-2"><strong>コメント：</strong></p>
                    <p class="break-words">{{ $answer->comment }}</p>
                </div>

                <div class="flex justify-between">
                    {{-- 戻るボタン --}}
                    <a href="{{ route('admin.answers.index') }}"
                       class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">
                        戻る
                    </a>

                    {{-- 削除実行 --}}
                    <form method="POST" action="{{ route('admin.answers.destroy', $answer->id) }}" onsubmit="return confirm('本当に削除しますか？');">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                            削除する
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
