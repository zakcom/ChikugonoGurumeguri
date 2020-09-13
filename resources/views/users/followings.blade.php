@extends('layouts.app')

@section('content')
<div class="row">
    <aside class="col-4-sm">
        {{-- ユーザ情報 --}}
        @include('users.card')
    </aside>
    <div class="col-8-sm">
         {{-- コース一覧 --}}
        <div class="card">
               <div class="card-header">
                   <h4 class="text-center">{{ $user->name }}さんのおすすめコース一覧</h4>
               </div>
               <div class="card-body">
                   
               </div>
           </div>
        {{-- タブ --}}
        @include('users.navtabs')
        {{-- ユーザ一覧 --}}
        @include('users.users')
    </div>
</div>
@endsection