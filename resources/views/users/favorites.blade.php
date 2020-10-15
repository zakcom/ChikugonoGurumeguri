@extends('layouts.app')

@section('content')
<div class="row">
     <aside class="col-sm-4">
        @include('users.card')
     </aside>
     <div class="col-sm-8">
     {{-- タブ --}}
      @include('users.navtabs')
      <div class="card">
          <div class="card-header">
              <h4 class="text-center">{{ $user->name }}さんのお気に入りグルメ一覧</h4>
          </div>
          <div class="card-body">
              {{-- お気に入りコース一覧 --}}
              @include('courses.courses')
          </div>
      </div>
     </div>
</div>
@endsection