@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<h1 class="text-2xl font-bold mb-4">Services</h1>

<a href="#">Create New Service</a>

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
