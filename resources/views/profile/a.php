<h1>プロフィール作成画面</h1>
<div class="row">
{!! Form::open(['route' => 'profile.store','enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {!! Form::label('profile_img', 'profile_img')!!}
        {!! Form::file('profile_img') !!}
   </div> 
   
    <div class="form-group">
        {!! Form::label('content', 'コメント')!!}
        {!! Form::text('content',old('content'), ['class' => 'form-control']) !!}
    </div>
        {!! Form::submit('プロフィールを設定する', ['class' => 'btn btn-info']) !!}
{!! Form::close() !!}
</div>
