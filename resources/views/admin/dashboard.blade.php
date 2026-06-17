<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            管理者ダッシュボード
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg text-center">
                <a href="{{ route('admin.answers.index') }}">集計・一覧表示</a>
            </div>
        </div>
    </div>
</x-app-layout>

