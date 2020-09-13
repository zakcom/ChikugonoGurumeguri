<ul class="nav nav-tabs nav-justified mb-3">
    {{-- ユーザー詳細タブ--}}
    <li class="nav-item">
        <a href="{{ route('users.show', ['user'=> $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active':''}}" >
        タイムライン
        <span class="bage bage-secondary">{{ $user->courses_count }}</span>  
        </a>
    </li>
    {{-- フォロー一覧 --}}
    <li class="nav-item">
        <a href="{{ route('users.followings', ['id'=> $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active':''}}">
        フォロー
         <span class="bage bage-secondary">{{ $user->followings_count }}</span>   
        </a>
    </li>
    {{-- フォロワー一覧 --}}
    <li class="nav-item">
        <a href="{{ route('users.followers', ['id'=> $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active':''}}">
        フォロワー
         <span class="bage bage-secondary">{{ $user->followers_count }}</span>   
        </a>
    </li>
 </ul>