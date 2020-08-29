@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ユーザー登録</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
           {!! Form::open([ route => 'signup.post']) !!} 
               <div class="form-group">
                   {!! Form::label('name','Name') !!}
                   {!! Form::text('name',oid('name'),['class' =>'form-controll'])!!}
               </div>
               
               <div class="form-group">
                   {!! Form::label('email','Email') !!}
                   {!! Form::email('email',oid('email'),['class' =>'form-controll'])!!}
               </div>
               
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

               
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-controll'] !!}
                </div>
                
                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection