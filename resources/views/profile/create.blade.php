<h1>プロフィール作成画面</h1>
<form action="{{ url('user/' . \Auth::id() . '/profile') }}" method='POST' enctype="multipart/form-data">
    {{ csrf_field() }}
    <h2>画像</h2>
    <input type="file" class="form-control" name="image_file">
    <hr>
    <h2>プロフィール文</h2>
     <input tyoe="textbox" class="form-control" name="content">
    <hr>
    <button class="btn btn-success">登録</button>
</form>