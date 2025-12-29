@extends('layouts.admin')

@section('content')
<div class="max-w-sm mx-auto mt-24">

    <h1 class="text-xl mb-6">Admin Login</h1>

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="mb-4">
            <label>Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                class="w-full border px-3 py-2"
            >
            @error('email')
                <div class="text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-6">
            <label>Password</label>
            <input
                type="password"
                name="password"
                required
                class="w-full border px-3 py-2"
            >
        </div>

        <button
            type="submit"
            class="w-full border px-4 py-2"
        >
            Login
        </button>
    </form>

</div>
@endsection
