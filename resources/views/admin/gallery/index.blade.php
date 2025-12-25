@extends('layouts.admin')

@section('title', 'Gallery')

@section('content')
<h1 class="text-2xl font-bold mb-4">Gallery</h1>

<a href="#">Create New Gallery</a>

<table class="mt-4 w-full border">
    <thead>
        <tr>
            <th>Title</th>
            <th>Published</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {{-- loop data nanti --}}
    </tbody>
</table>
@endsection
