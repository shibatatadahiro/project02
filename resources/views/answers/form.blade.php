<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            回答フォーム
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8" style="max-width: 1000px;">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('answer.store') }}">
                    @csrf

                    {{-- 全体的な評価 --}}
                    <div class="mb-8">
                        <label class="block text-lg font-semibold mb-4">全体的な評価</label>

                        <div class="flex items-center justify-start gap-6">

                            {{-- 左端ラベル --}}
                            <span class="text-gray-700">悪かった</span>

                            {{-- ラジオボタン5つ --}}
                            <div class="flex gap-6">
                                <label>
                                    <input type="radio" name="evaluation" value="1" checked>
                                </label>

                                <label>
                                    <input type="radio" name="evaluation" value="2">
                                </label>

                                <label>
                                    <input type="radio" name="evaluation" value="3">
                                </label>

                                <label>
                                    <input type="radio" name="evaluation" value="4">
                                </label>

                                <label>
                                    <input type="radio" name="evaluation" value="5">
                                </label>
                            </div>

                            {{-- 右端ラベル --}}
                            <span class="text-gray-700">良かった</span>
                        </div>
                    </div>

                    {{-- コメント --}}
                    <div class="mb-6">
                        <label class="block text-lg font-semibold mb-3">コメント</label>
                        @error('comment')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea name="comment" rows="4"
                                  class="w-full border-gray-300 rounded-lg"
                                  placeholder="ご意見・ご感想を入力してください">{{ old('comment') }}</textarea>
                    </div>

                    {{-- 送信ボタン --}}
                    <div class="mt-6">
                        <button type="submit"
                                class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                            送信
                        </button>
                    </div>
                </form>

                {{-- 回答一覧へのリンク --}}
                <div class="text-center mt-8">
                    <a href="{{ route('answers.index') }}" class="text-blue-600 underline">
                        回答一覧を見るへ
                    </a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
