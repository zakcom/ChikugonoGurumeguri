@extends ('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4">
        <div class="text-center">
            <h3 class="brown-border p-2">ユーザー検索</h3>
        </div>
        
        {!! Form::open(['route'=>'search','method' =>'get']) !!}
            <div class="form-group">
                {!! Form::label ('text','ユーザー名')!!}
                {!! Form::text ('name','',['class' =>'form-control', 'placeholder' => '指定なし']) !!}
            </div>
            {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-sm-8">
       <div class="text-center">
          <h3 class="p-2">ユーザー一覧</h3> 
       </div> 
       
       <div class="container">
           <!--//検索ボタンが押された時に表示する-->
           @if(!empty($data))
            <div class="my-2 p-0">
                    <div class="row border-bottom text-center">
                        <div class="col-sm-4">
                            <p>ユーザー名</p>
                        </div>
                    </div>
                <!--//検索条件に一致したユーザを表示します-->
                @foreach($data as $item)
                    <div class="row py-2 border-bottom text-center">
                        <!--<a href="">{{ $item->name }}</a>--> 
                        {!! link_to_route('users.show',$item->name, ['user' => $item->id]) !!}
                    </div>
                @endforeach
            </div>
            {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
        　 @endif
        </div>
    </div>
</div>
@endsection    