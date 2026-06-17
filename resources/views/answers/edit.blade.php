<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            回答の編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8" style="max-width: 1000px;">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('answers.update', $answer->id) }}">
                    @csrf
                    @method('PUT')

                    {{-- 全体的な評価 --}}
                    <div class="mb-8">
                        <label class="block text-lg font-semibold mb-4">全体的な評価</label>

                        <div class="flex items-center justify-start gap-8">

                            {{-- 左端ラベル --}}
                            <span class="text-gray-700">悪かった</span>

                            {{-- ラジオボタン5つ --}}
                            <div class="flex gap-6">
                                @for ($i = 1; $i <= 5; $i++)
                                    <label>
                                        <input type="radio" name="evaluation" value="{{ $i }}"
                                            {{ $answer->evaluation == $i ? 'checked' : '' }}>
                                    </label>
                                @endfor
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
                                  placeholder="ご意見・ご感想を入力してください">{{ old('comment', $answer->comment) }}</textarea>
                    </div>

                    {{-- ボタン --}}
                    <div class="mt-6 flex gap-4">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            更新する
                        </button>

                        <a href="{{ route('answers.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                            戻る
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
