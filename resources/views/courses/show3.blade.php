@extends('layouts.app')

@section('content')
<ul class="unstyled">
    <li class="media">
        <div class="media-body">
            {{ $courses->courses_name }}
        </div>
    </li>
</ul>

@endsection