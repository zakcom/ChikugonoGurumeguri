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
               <th scop="row">{{ $val->user->name }}</th>
               <td>
                {{ optional($val)->courses_name }}
               </td>
              
               <td>
                {{ optional($val)->photo }}
               </td>
               
                <td>
                {{ optional($val)->adress }}
                </td>
                
                <td>
                {{ optional($val)->menu }}
                </td>
                
                <td>
                {{ optional($val)->content }}
                </td>
            </tr>
             @endforeach
       </tbody>
   </table>
@endsection