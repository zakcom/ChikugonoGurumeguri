@extends('layouts.app')
 
@section('content')

@if (count($users) >0)
    <ul class="list-unstyled">
    @foreach($users as $user)
        <li class="media">
            <div class="media-body">
                {{ $user->name }}
            </div>
            <div>
                {{-- ユーザー詳細へのリンク　--}}
                <p>{!! link_to_route('users.show', 'プロフィールを見る', ['user' => $user->id ]) !!}</p>
            </div>
        </li>
    @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
@endif

@endsection