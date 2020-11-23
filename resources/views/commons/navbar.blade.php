<header class="mb-4">
   <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
       {{-- トップページへのリンク --}}
       <a class="navbar-brand" href="/">ちっごのグル巡り</a>
       
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    {{-- ユーザー一覧ページへのリンク --}}
                    <li class"nav-item">{!! link_to_route('users.index', 'Users', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right" >
                             {{-- ユーザ詳細ページへのリンク --}}
                             <li class="dropdown-item">{!! link_to_route('users.show', 'プロフィール', ['user' => Auth::id()]) !!}</li>
                             <li class="dropdown-divider"></li>
                             {{-- プロフィール作成ページへのリンク --}}
                             <li class="dropdown-item">{!! link_to_route('profile.create','プロフィール設定', ['user' => Auth::id()]) !!}</li>
                             {{-- レポート作成ページへのリンク --}}
                             <li class="dropdown-item">{!! link_to_route('courses.create','グルメレポート作成', ['user' => Auth::id()]) !!}</li>
                             {{-- ログアウトへのリンク --}}
                             <li class="dropdown-item">{!! link_to_route('logout.get','ログアウト') !!}</li>
                             {{--お問い合わせページへのリンク--}}
                             <li class="dropdown-item">{!! link_to_route('contact.get','お問い合わせ') !!}</li>
                             
                        </ul>
                        
                    </li>
                @else
                    {{-- ユーザー登録ページへのリンク　--}}
                   <li class="nav-item">{!! link_to_route('signup.get', '新規登録', [], ['class' => 'nav-link']) !!}</li>
                
                    {{-- ログインページへのリンク　--}}
                   <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
　　</nav> 
</header>