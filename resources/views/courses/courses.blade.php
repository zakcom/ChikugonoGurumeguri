@if (count($courses) >0)
    <ul class="list-unstyled">
        @foreach($courses as $course)
        <li class="media mb-3">
            <div class="media-body">
                {{-- コース所有者のユーザー詳細ページへのリンク --}}
                {!! link_to_route('users.show', $course->user->name, ['user' => $course->user->id]) !!}
                <span class="text-muted">posted at{{ $course->created_at }}</span>
            </div>
            <div>
                {{--  コース内容　--}}
                <p class="mb-0">{!! $course->courses_name !!}</p>
            </div>
            <div>
                @if(\Auth::id() === $course->user_id)
                  {{-- コース削除ボタンのフォーム --}}
                  {!! Form::open(['route' => ['courses.destroy', $course->id], 'method' => 'delete']) !!}
                      {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                  {!! Form::close() !!}
                @endif
            </div>
        </li>
        @endforeach
    </ul>
    {{-- ページネーションへのリンク --}}
    {{ $courses->links() }}
@endif