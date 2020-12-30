@extends('layouts.app')

@section('content')
<style>
    body {background-color: #FFCCCC;}
</style>

<h2>プロフィール編集</h2><br>

    <!--<form action='{{ url('profile/' . $profile->id) }}' method='POST'>-->
       <form action="{{ url('user/' . $profile->id . '/profile') }}" method='POST' enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name='id' value='{{ $profile->id }}'><br>
        ユーザーID:{{ $profile->user_id }}<br>
        画像:<input type='file' name='profile_img'><br>
        
        プロフィール文<input type='textarea' name='content' value='{{ $profile->content }}'><br>
        <input type='submit' value='更新する'>
    </form>
@endsection