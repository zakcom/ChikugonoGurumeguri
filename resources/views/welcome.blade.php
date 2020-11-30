@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="row">
            <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
            </aside>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                       <h4 class="text-center">皆んなのグルメレポート一覧</h4> 
                    </div>
                    <div class="card-bpdy">
                         {{-- コース一覧 --}}
                         @include('courses.courses')
                    </div>
                </div>
            </div>
        </div>
    
    @else
    <section class="logo">
    <div class="jumbotron jumbotron-extend">
       
        <div class="container">
            <h1 class="site-name">みんなで作る<br>「ちっごのグルメ」</h1>
            {{-- ユーザー登録ページへのリンク --}}
            {!! link_to_route('signup.get', '今すぐ登録', [], ['class' => 'btn btn-lg  btn-success']) !!}
        </div>
    </div>
    </section>
    
    <section class="hanemaru">
        <div class="about_block section">
            <div class="about_box">
                <p>
                    <h3 class="main_title">筑後市の美味しいグルメを発掘しよう<img src="assets/CSS/main_l.jpg" alt="筑後市イメージキャラクター「はね丸」" height="300" width="300"> </h3><br>
                    
                    <b>ちっごのグル巡り</b>は、<b>「筑後市(ちっご)で味わえる、あなたのイチオシグルメを登録、共有できるサービス」</b>です。<br>
                    新しく筑後市を訪れる方や筑後市にお住まいの方にも、筑後市の魅力的なグルメ情報を提供します。<br>
                    まだまだ眠っている筑後市の絶品メニューを発掘しましょう。
                </p>
            </div>
        </div>
    </section>
    
    <section class="step_first">
        <div class="row">
            <div class="col-sm-5 step_contents">
                <h2 class="step_contents_title">アカウント登録</h2>
                  <p>
                     まずはサインアップして<br>
                     グルメレポートを投稿してみましょう。<br>
                     <br>
                     {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-md  btn-success']) !!}
                  </p>
            </div>
        
            <div class="offset-sm-2 col-sm-5">
                <img src="assets/CSS/gourmet_writer_man.png" class="image">
            </div>
        </div>
    </section>
    
    <section class="step_second">
        <div class="row">
            <div class="col-sm-5 step_contents_2">
                <h2 class="step_contents_title">グルメ情報を共有</h2>
                <p>
                    他のユーザーのグルメレポートを見てみましょう。<br>
                    気に入ったレポートはお気に入りに追加して<br>
                    そのユーザーをフォローすることもできます。
                </p>
            </div>
           <div class="offset-sm-2 col-sm-5">
                <img src="assets/CSS/mark_heart_plus_one.png" class="image">
            </div>
        </div>    
    </section>
    
    <section>
         <div class="card-deck" width=":18rem">
            <div class="card bg-dark text-white" style="width:15rem;">
                <img src="assets/CSS/istockphoto-1192857007-170667a.jpg" class="card-img"> 
                <div class="card-img-overlay">
                  <h5 class="card-title">居酒屋</h5>
                  <p class="card-text"></p>
               </div>
            </div> 
            
              <div class="card bg-dark text-white" style="width:15rem;">
                <img src="assets/CSS/eating-601581__480.jpg" class="card-img"> 
                <div class="card-img-overlay">
                  <h5 class="card-title">ランチ</h5>
                  <p class="card-text"></p>
               </div>
            </div> 
            
             <div class="card bg-dark text-white" style="width:15rem;">
                <img src="assets/CSS/coffee-3203332_1280.jpg" class="card-img"> 
                <div class="card-img-overlay">
                  <h5 class="card-title">カフェ</h5>
                  <p class="card-text"></p>
               </div>
            </div> 
        </div>
               
    </section>
    
    <div class="button_link">{!! link_to_route('signup.get', 'ちっごのグル巡りを使ってみる', [], ['class' => 'btn btn-lg  btn-success']) !!}</div>
    @endif
@endsection