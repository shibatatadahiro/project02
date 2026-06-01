<h1>回答一覧</h1>

@if ($answers->isEmpty())
    <p>回答データがありません。</p>
@else
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ユーザー名</th>
            <th>評価</th>
            <th>コメント</th>
            <th>日時</th>
        </tr>

        @foreach ($answers as $answer)
            <tr>
                <td>{{ $answer->id }}</td>
                <td>{{ $answer->user->name }}</td>
                <td>{{ $answer->evaluation }}</td>
                <td>{{ $answer->comment }}</td>
                <td>{{ $answer->created_at }}</td>
            </tr>
        @endforeach
    </table>
@endif
