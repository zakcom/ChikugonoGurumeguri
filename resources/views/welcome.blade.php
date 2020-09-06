@extends ('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name}}</h3>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">プロフィール</h3>
                    {{--　画像 --}}
                    <p class="card-text">おおきにです！</p>
                    </div>
                </div>
            </aside>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                       <h4 class="text-center">皆んなのおすすめコース一覧</h4> 
                    </div>
                    <div class="card-bpdy">
                         {{-- コース一覧 --}}
                         @include('courses.courses')
                    </div>
                </div>
               
            </div>
        </div>
    
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