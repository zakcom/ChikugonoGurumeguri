@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <h3 class="card-title">プロフィール</h3>
                    {{--　画像 --}}
                    <img src="/image/{{ $user->profile_img }}">
                </div>
            </div>
            {{--  フォロー/アンフォローボタン --}}
             @include('user_follow.follow_button')
        </aside>
        <div class="col-sm-8">
           <div class="card">
               <div class="card-header">
                   <h4 class="text-center">{{ $user->name }}さんのおすすめコース一覧</h4>
               </div>
               <div class="card-body">
                   
               </div>
           </div>
           {{-- タブ --}}
           @include('users.navtabs')
           
           <!--<ul class="nav nav-tabs nav-justified mb-3">-->
           <!--    {{-- ユーザー詳細タブ--}}-->
           <!--    <li class="nav-item">-->
           <!--        <a href="{{ route('users.show', ['user'=> $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active':''}}" >-->
           <!--           タイムライン-->
           <!--         <span class="bage bage-secondary">{{ $user->courses_count }}</span>  -->
           <!--        </a>-->
           <!--    </li>-->
           <!--    {{-- フォロー一覧 --}}-->
           <!--    {{-- フォロワー一覧 --}}-->
           <!--</ul>-->
        </div>
    </div>
@endsection