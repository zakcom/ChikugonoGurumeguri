<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body">
        <h3 class="card-title">プロフィール</h3>
        {{--　画像 --}}
        <img src="/image/{{ $user->profile_img }}">
    </div>
</div>
            {{--  フォロー/アンフォローボタン --}}
             @include('user_follow.follow_button')