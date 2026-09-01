<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - Petshop Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-panel min-h-screen bg-[#f7f8fa] text-slate-900">
@php
    $navigationGroups = [
        'Ringkasan' => [
            ['label' => 'Dashboard', 'route' => 'admin.dashboard', 'active' => 'admin.dashboard', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h4v-6h4v6h4a1 1 0 001-1V10"/>'],
        ],
        'Produk' => [
            ['label' => 'Daftar Produk', 'route' => 'admin.products.index', 'active' => 'admin.products.*', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>'],
            ['label' => 'Kategori', 'route' => 'admin.categories.index', 'active' => 'admin.categories.*', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.5 0 1 .2 1.4.6l7 7a2 2 0 010 2.8l-7 7a2 2 0 01-2.8 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/>'],
            ['label' => 'Merek', 'route' => 'admin.brands.index', 'active' => 'admin.brands.*', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4m6-2l2.3 6.9L21 12l-5.7 2.1L13 21l-2.3-6.9L5 12l5.7-2.1L13 3z"/>'],
        ],
        'Konten Website' => [
            ['label' => 'Hero', 'route' => 'admin.heroes.index', 'active' => 'admin.heroes.*', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.5-4.5a2 2 0 012.8 0L16 16m-2-2l1.5-1.5a2 2 0 012.8 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>'],
            ['label' => 'Layanan', 'route' => 'admin.services.index', 'active' => 'admin.services.*', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.25A23.9 23.9 0 0112 15c-3.18 0-6.22-.62-9-1.75M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>'],
            ['label' => 'Artikel', 'route' => 'admin.articles.index', 'active' => 'admin.articles.*', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2zM14 4v4h4M7 13h8M7 17h5"/>'],
            ['label' => 'Galeri', 'route' => 'admin.galleries.index', 'active' => 'admin.galleries.*', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.5-4.5a2 2 0 012.8 0L16 16m-2-2l1.5-1.5a2 2 0 012.8 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>'],
        ],
        'Pesan & Pengaturan' => [
            ['label' => 'Kotak Masuk', 'route' => 'admin.inbox.index', 'active' => 'admin.inbox.*', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.9 5.3a2 2 0 002.2 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>'],
            ['label' => 'Pelanggan Newsletter', 'route' => 'admin.subscribers.index', 'active' => 'admin.subscribers.*', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.4-1.9M17 20H7m10 0v-2c0-.7-.1-1.3-.4-1.9M7 20H2v-2a3 3 0 015.4-1.9M7 20v-2c0-.7.1-1.3.4-1.9m0 0a5 5 0 019.2 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>'],
            ['label' => 'Info Kontak', 'route' => 'admin.contact_settings.index', 'active' => 'admin.contact_settings.*', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.3 4.3c.4-1.7 2.9-1.7 3.4 0a1.7 1.7 0 002.6 1c1.5-.9 3.3.9 2.4 2.4a1.7 1.7 0 001 2.6c1.7.4 1.7 2.9 0 3.4a1.7 1.7 0 00-1 2.6c.9 1.5-.9 3.3-2.4 2.4a1.7 1.7 0 00-2.6 1c-.4 1.7-2.9 1.7-3.4 0a1.7 1.7 0 00-2.6-1c-1.5.9-3.3-.9-2.4-2.4a1.7 1.7 0 00-1-2.6c-1.7-.4-1.7-2.9 0-3.4a1.7 1.7 0 001-2.6c-.9-1.5.9-3.3 2.4-2.4 1 .6 2.3.1 2.6-1z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>'],
        ],
    ];
@endphp

<div x-data="{ sidebarOpen: false }" class="min-h-screen lg:flex">
    @auth
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-30 bg-slate-950/45 lg:hidden" @click="sidebarOpen = false" x-cloak></div>

        <aside
            class="fixed inset-y-0 left-0 z-40 flex w-72 -translate-x-full flex-col border-r border-slate-200/80 bg-white shadow-xl transition-transform duration-300 lg:sticky lg:top-0 lg:h-screen lg:w-64 lg:translate-x-0 lg:shadow-none"
            :class="{ 'translate-x-0': sidebarOpen }"
        >
            <div class="border-b border-slate-200/80 px-4 py-4">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-slate-950 text-white shadow-sm">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21s-7-4.4-7-10a4 4 0 017-2.6A4 4 0 0119 11c0 5.6-7 10-7 10z"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-slate-950">Petshop Admin</p>
                        <p class="truncate text-xs font-medium text-slate-500">Panel pengelolaan</p>
                    </div>
                </div>
            </div>

            <nav class="flex-1 space-y-5 overflow-y-auto px-3 py-4">
                @foreach($navigationGroups as $group => $items)
                    <div>
                        <p class="mb-2 px-3 text-[10px] font-bold uppercase tracking-widest text-slate-400">{{ $group }}</p>
                        <div class="space-y-0.5">
                            @foreach($items as $item)
                                @php($isActive = request()->routeIs($item['active']))
                                <a
                                    href="{{ route($item['route']) }}"
                                    class="group relative flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-semibold transition {{ $isActive ? 'bg-slate-950 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950' }}"
                                    @click="sidebarOpen = false"
                                >
                                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-md {{ $isActive ? 'bg-white/10 text-white' : 'text-slate-400 group-hover:text-teal-700' }}">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            {!! $item['icon'] !!}
                                        </svg>
                                    </span>
                                    <span class="truncate">{{ $item['label'] }}</span>
                                    @if($isActive)
                                        <span class="ml-auto h-1.5 w-1.5 rounded-full bg-teal-300"></span>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </nav>

            <div class="border-t border-slate-200/80 p-3">
                <div class="mb-3 rounded-lg border border-slate-200 bg-slate-50 px-3 py-3">
                    <p class="text-xs font-medium text-slate-500">Login sebagai</p>
                    <p class="truncate text-sm font-bold text-slate-800">{{ auth()->user()->name ?? auth()->user()->email }}</p>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-semibold text-rose-600 transition hover:bg-rose-50">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        Keluar
                    </button>
                </form>
            </div>
        </aside>
    @endauth

    <div class="min-w-0 flex-1 overflow-hidden">
        @auth
            <header class="sticky top-0 z-20 border-b border-slate-200/80 bg-white/85 backdrop-blur">
                <div class="flex min-h-16 items-center justify-between gap-4 px-4 sm:px-6 lg:px-7">
                    <div class="flex min-w-0 items-center gap-3">
                        <button type="button" class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 lg:hidden" @click="sidebarOpen = true" aria-label="Open navigation">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                        <div class="min-w-0">
                            <p class="truncate text-xs font-semibold uppercase tracking-wide text-slate-400">Panel Admin</p>
                            <h1 class="truncate text-base font-bold text-slate-950">@yield('title', 'Dashboard')</h1>
                        </div>
                    </div>
                    <a href="{{ route('home') }}" target="_blank" class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:border-teal-200 hover:text-teal-700 sm:h-auto sm:w-auto sm:px-3 sm:py-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3h7m0 0v7m0-7L10 14M5 5h6M5 5v14h14v-6"/>
                        </svg>
                        <span class="hidden text-sm font-semibold sm:inline">Lihat Website</span>
                    </a>
                </div>
            </header>
        @endauth

        <main class="@auth min-w-0 px-4 py-5 sm:px-6 lg:px-7 @else min-h-screen @endauth">
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
