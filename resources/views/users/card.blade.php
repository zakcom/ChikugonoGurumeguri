<style>
    img {
        width:300px;
        height:200px;
    }
</style>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
    <div class="card-body">
        <h4 class="card-title">プロフィール</h4>
        {{--　画像 --}}
        @if (!empty($user->profile->profile_img))
        <!--<img src="{{ asset('storage/img/' . $user->profile->profile_img) }}">-->
        <img src="{{ $user->profile->profile_img }}">
        @endif
        {{-- 紹介文 --}}
        @if (!empty($user->profile->content))
            <p class="card">{{ $user->profile->content }}</p>
        @endif
    </div>
</div>
            {{--  フォロー/アンフォローボタン --}}
             @include('user_follow.follow_button')