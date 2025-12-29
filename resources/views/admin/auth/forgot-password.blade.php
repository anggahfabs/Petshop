@extends('layouts.admin')

@section('title', 'Forgot Password')

@section('content')
<h1>Forgot Password</h1>

<form method="POST" action="{{ route('admin.password.email') }}">
    @csrf

    <div>
        <label>Email</label><br>
        <input type="email" name="email">
    </div>

    <button type="submit">Send Reset Link</button>
</form>
@endsection
