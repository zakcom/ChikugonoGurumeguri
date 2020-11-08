@extends('layouts.app')


@section('content')
<style>
    body {background-color: #FFCCCC;}
</style>
<h1>プロフィール作成画面</h1>
<!--<form action="{{ url('user/' . \Auth::id() . '/profile') }}" method='POST' enctype="multipart/form-data">-->
<form action="{{ url('profile') }}" method='POST' enctype="multipart/form-data">
    {{ csrf_field() }}
    <h2>画像</h2>
    <input type="file" class="form-control" name="profile_img">
    <hr>
    <h2>プロフィール文</h2>
     <input tyoe="textarea" class="form-control" name="content">
    <hr>
    <button class="btn btn-success">登録</button>
</form>
@endsection