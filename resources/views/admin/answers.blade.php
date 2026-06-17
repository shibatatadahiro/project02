<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            集計・一覧表示画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8" style="max-width: 1000px;">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- ★ 評価の集計表示 --}}
                <h3 class="text-lg font-semibold mb-4">全体的な評価の集計</h3>

                <ul class="mb-6">
                    <li>5：{{ $counts[5] }}件</li>
                    <li>4：{{ $counts[4] }}件</li>
                    <li>3：{{ $counts[3] }}件</li>
                    <li>2：{{ $counts[2] }}件</li>
                    <li>1：{{ $counts[1] }}件</li>
                </ul>

                <hr class="my-6">

                {{-- ★ コメント一覧 --}}
                <p class="text-lg font-semibold mb-6">コメント</p>

                @forelse ($answers as $answer)
                    <div class="border-b pb-4 mb-6">

                        {{-- 上段：左に名前・日付・評価、右に削除ボタン --}}
                        <div class="flex justify-between items-start">

                            {{-- 左側 --}}
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

                            {{-- 右側：削除ボタン（編集なし） --}}
                            <div>
                                <a href="{{ route('admin.answers.deleteConfirm', $answer->id) }}"
                                   class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                    削除
                                </a>
                            </div>

                        </div>

                        {{-- コメント --}}
                        <p class="mt-3 break-words">
                            {{ $answer->comment }}
                        </p>

                    </div>

                @empty
                    <p class="text-center text-gray-600 py-10 text-lg">
                        データがありません
                    </p>
                @endforelse

            </div>

        </div>
    </div>
</x-app-layout>
