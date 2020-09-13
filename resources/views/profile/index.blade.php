<form method="POST" action"/profile" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="photo">
    <input type="submit">
</form>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


