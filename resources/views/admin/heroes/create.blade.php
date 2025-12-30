@extends('layouts.admin')

@section('content')
<form method="POST" action="{{ route('admin.heroes.store') }}" enctype="multipart/form-data">
@csrf

<input name="title" placeholder="Title" required>
<input name="subtitle" placeholder="Subtitle">
<input name="button_text" placeholder="Button Text">
<input name="button_link" placeholder="Button Link">
<input type="file" name="image">

<label>
    <input type="checkbox" name="is_active" value="1"> Active
</label>
<br>

<button>Save</button>
</form>
@endsection
