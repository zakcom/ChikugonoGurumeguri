@extends('layouts.app')

@section('content')
<h2 class="text-center mb-5">ちっごのグルメ</h2>
  
<table class="table-striped">
    <thead>
        <tr>
            <th scop="col">ユーザー名</th>
            <th scop="col">タイトル</th>
            <th scop="col">店名</th>
            <th scop="col">住所</th>
            <th scop="col">イチオシメニュー</th>
            <th scop="col">コメント</th>
        </tr>
</thead>
    <tbody>
        @foreach($data as $val)
            <tr>
                    <td>
                    {{ ($val)->courses_name }}
                    </td>
            
                    <td>
                        {{ $val->photo }}
                    </td>
                    
                    <td>
                        {{ ($val)->adress }}
                    </td>
                    
                    <td>
                        {{ ($val)->menu }}
                    </td>
                    
                    <td>
                        {{ ($val)->content }}
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection