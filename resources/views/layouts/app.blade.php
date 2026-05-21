<!DOCTYPE html>
<html lang="en">
<head>
@include('partials.meta')
<title>@yield('title', 'Petshop')</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">

    {{-- Navbar --}}
    @include('partials.navbar')
    
    {{-- Content --}}
    <main class="flex-1">
        @yield('content')
    </main>
    
    {{-- Footer --}}
    @include('partials.footer')
</body>
</html>
