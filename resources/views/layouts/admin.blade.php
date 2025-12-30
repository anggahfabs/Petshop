<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex">

    @auth
    <aside class="w-64 border-r px-4 py-6">
        <strong>Admin Panel</strong>
        <form method="POST" action="{{ route('admin.logout') }}" class="mt-6">
    @csrf
    <button type="submit">Logout</button>
</form>

        <nav class="mt-6">
            <ul class="space-y-2">
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.heroes.index') }}">Heroes</a></li>
                <li><a href="{{ route('admin.services.index') }}">Services</a></li>
                <li><a href="{{ route('admin.products.index') }}">Products</a></li>
                <li><a href="{{ route('admin.articles.index') }}">Articles</a></li>
                <li><a href="{{ route('admin.gallery.index') }}">Gallery</a></li>
                <li><a href="{{ route('admin.appointments.index') }}">Appointments</a></li>
            </ul>
        </nav>
    </aside>
    @endauth

    <main class="flex-1 px-8 py-6">
        @yield('content')
    </main>

</body>

</html>
