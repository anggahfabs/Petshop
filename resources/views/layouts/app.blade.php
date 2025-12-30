<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

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
    
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-out-cubic',
        });
    </script>
</body>
</html>
