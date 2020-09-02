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
                    <p class="card-text">おおきにです！</p>
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
           <div class="card">
               <div class="card-header">
                   <h4 class="text-center">{{ $user->name }}さんのおすすめコース一覧</h4>
               </div>
               <div class="card-body">
                   
               </div>
           </div>
           
           <div class="card">
               <div class="card-header">
                   <h4 class='text-center'>タイムライン</h4>
               </div>
               <div class="card-body">
                   
               </div>
        </div>
    </div>
@endsection