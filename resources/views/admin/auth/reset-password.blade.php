@extends('layouts.admin')

@section('title', 'Reset Password')

@section('content')
<h1>Reset Password</h1>

<form method="POST" action="{{ route('admin.password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div>
        <label>Email</label><br>
        <input type="email" name="email">
    </div>

    <div>
        <label>New Password</label><br>
        <input type="password" name="password">
    </div>

    <div>
        <label>Confirm Password</label><br>
        <input type="password" name="password_confirmation">
    </div>

    <button type="submit">Reset Password</button>
</form>
@endsection
