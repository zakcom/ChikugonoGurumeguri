@extends ('layouts.app')

@section('content')
<h3 class="text-center">オリジナルコースを作成する</h3>
{!! Form::open (['route' => 'courses.store']) !!}
    <div class="form-group">
        {!! Form::textarea('courses_name', old('courses_name'), ['class' => 'form-control', 'rows' => '2']) !!}
        {!! Form::submit('コースを作成する', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}
@endsection
