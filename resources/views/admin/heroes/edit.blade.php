@extends('layouts.admin')

@section('content')
<form method="POST" action="{{ route('admin.heroes.update', $hero) }}" enctype="multipart/form-data">
@csrf @method('PUT')

<input name="title" value="{{ $hero->title }}" required>
<textarea name="subtitle">{{ $hero->subtitle }}</textarea>
<input name="button_text" value="{{ $hero->button_text }}">
<input name="button_link" value="{{ $hero->button_link }}">
<input type="file" name="image">

<label>
    <input type="checkbox" name="is_active" value="1" {{ $hero->is_active ? 'checked' : '' }}>
    Active
</label>

<button>Update</button>
</form>
@endsection
