<header class="mb-4">
   <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
       {{-- トップページへのリンク --}}
       <a class="navbar-brand" href="/">ちっご巡り</a>
       
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                {{-- ユーザー登録ページへのリンク　--}}
               {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-success']) !!}
                
                {{-- ログインページへのリンク　--}}
                <li class="nav-item"><a href="#"　class="nav-link">ログイン</a></li>
            </ul>
        </div>
　　</nav> 
</header>