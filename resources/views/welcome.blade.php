@extends ('layouts.app')

@section('content')
    @if(Auth::check())
    {{ Auth::user()->name }}
    
    @else
    <div class="jumbotron">
        
        <div class="container">
            <h1>みんなで作る「ちっごのコース」</h1>
            {{-- ユーザー登録ページへのリンク --}}
            {!! link_to_route('signup.get', '今すぐ登録', [], ['class' => 'btn btn-lg  btn-success']) !!}
        </div>
        
    </div>
    @endif
@endsection