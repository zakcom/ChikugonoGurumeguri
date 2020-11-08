 @extends ('layouts.app')

 @section('content')
 <style>
     body {background-color: #FFCCCC;}
 </style>
 
     <div class="text-center">
         <h2>グルメレポートを作成する</h2>
     </div>
     
     <div class="row">
         <div class="col-md-12">
         {{-- メニュー登録 --}}
            {!! Form::open (['route' => 'courses.store']) !!}
             <div class="form-group">
            {!! Form::label('courses_name', 'タイトル') !!}
            {!! Form::text('courses_name', old('courses_name'), ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
             {!! Form::label('adress', '住所') !!}
             {!! Form::text('adress', old('adress'), ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-row">
            
            <div class="form-group col-sm-6">
             {!! Form::label('photo', '店名') !!}
             {!! Form::text('photo', old('photo'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-sm-6">
             {!! Form::label('menu', 'イチオシメニュー') !!}
             {!! Form::text('menu', old('menu'), ['class' => 'form-control']) !!}
        </div>
        
        </div>
        
        <div class="form-group">
             {!!  Form::label('content', 'コメント') !!}
             {!!  Form::textarea('content', old('content'), ['class' => 'form-control']) !!}
        </div>
            {!! Form::submit('作成', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
        </div>
    </div>
 @endsection