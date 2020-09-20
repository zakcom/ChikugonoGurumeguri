@extends('layouts.app')

@section('content')
<div class="row">
    <aside class="col-sm-4">
        {{-- ユーザ情報 --}}
        @include('users.card')
    </aside>
    <div class="col-sm-8">
         {{-- タブ --}}
        @include('users.navtabs')
        {{-- コース一覧 --}}
        <div class="card">
               <div class="card-header">
                   <h4 class="text-center">{{ $user->name }}さんのフォロワー一覧</h4>
               </div>
               <div class="card-body">
                   {{-- ユーザ一覧 --}}
                   @include('users.users')
               </div>
        </div>
        
    </div>
</div>
@endsection