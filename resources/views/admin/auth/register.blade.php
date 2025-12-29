@extends('layouts.admin')

@section('title', 'Create Admin Account')

@section('content')
<h1>Create Admin Account</h1>

<form method="POST" action="{{ route('admin.register.submit') }}">
    @csrf

    <div>
        <label>Name</label><br>
        <input type="text" name="name">
    </div>

    <div>
        <label>Email</label><br>
        <input type="email" name="email">
    </div>

    <div>
        <label>Password</label><br>
        <input type="password" name="password">
    </div>

    <div>
        <label>Confirm Password</label><br>
        <input type="password" name="password_confirmation">
    </div>

    <button type="submit">Register</button>
</form>
@endsection
