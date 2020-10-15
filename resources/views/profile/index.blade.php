<h1>画像一覧</h1>

<a href="./create">新しい画像を登録する</a>
@if (count($profiles) >0 )
    <table class="table table-striped">
        <thead>
            <th>id</th>
            <th>画像</th>
        </thead>
        <tbody>
            @foreach($profiles as $profile)
            <tr>
                <td>{{ $profile->id }}</td>
                <td><img src="{{ asset('storage/img/',$profile->profile_img) }}"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
<p>画像はまだ登録されていません。</p>

@endif
