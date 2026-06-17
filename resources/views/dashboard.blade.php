<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ダッシュボード
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                <p class="text-lg mb-6">アンケートへのご協力をお願いします。</p>

                <a href="{{ route('answer.form') }}"
                   class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-blue-700 transition">
                    回答フォームへ進む
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
