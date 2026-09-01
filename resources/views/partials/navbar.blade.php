<nav 
    x-data="{ 
        scrolled: false,
        mobileMenuOpen: false,
        isHome: {{ Route::is('home') ? 'true' : 'false' }} 
    }" 
    @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="(scrolled || !isHome || mobileMenuOpen) ? 'bg-white/95 backdrop-blur-md shadow-xl py-3 md:py-4' : 'bg-transparent py-5 md:py-8'"
    class="fixed top-0 left-0 right-0 z-[100] transition-all duration-500 px-4 md:px-12"
>
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="group flex items-center gap-2 md:gap-3 relative z-[110]">
    <div class="w-8 h-8 md:w-12 md:h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl md:rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
        <svg class="w-5 h-5 md:w-7 md:h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.5c-1.5 0-2.5 1-2.5 2.5s1 2.5 2.5 2.5 2.5-1 2.5-2.5-1-2.5-2.5-2.5zm0 0V4m0 11.5c-2 0-6 1-6 3V20h12v-1.5c0-2-4-3-6-3z"/>
            <circle cx="18" cy="8" r="2"/>
        </svg>
    </div>
    <span :class="(scrolled || !isHome || mobileMenuOpen) ? 'text-gray-900' : 'text-white'" class="text-lg md:text-3xl font-bold transition-colors duration-500 tracking-tight">
        OVI<span class="text-blue-600"> PETSHOP</span>
    </span>
</a>

        {{-- Desktop Menu --}}
        <ul class="hidden lg:flex items-center gap-10">
            @php $links = ['Beranda' => 'home', 'Layanan' => 'services.index', 'Produk' => 'products.index', 'Artikel' => 'articles.index', 'Galeri' => 'gallery.index', 'Kontak' => 'contact.index']; @endphp
            @foreach($links as $name => $route)
                <li>
                    <a href="{{ route($route) }}" 
                       :class="(scrolled || !isHome) ? 'text-gray-700 hover:text-blue-600' : 'text-white hover:text-white'"
                       class="font-semibold text-base transition-all duration-300 relative group py-2"
                    >
                        {{ $name }}
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 transition-all duration-500 group-hover:w-full"></span>
                    </a>
                </li>
            @endforeach
        </ul>

        {{-- Action Buttons --}}
        <div class="flex items-center gap-2 md:gap-4 relative z-[110]">
            <a href="{{ $whatsappLink }}" 
               class="hidden md:flex bg-blue-600 text-white px-8 py-3.5 rounded-2xl font-bold text-sm shadow-xl shadow-blue-500/20 hover:bg-blue-700 hover:-translate-y-1 transition-all duration-300">
                WhatsApp
            </a>
            
            {{-- Mobile Toggle --}}
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden w-10 h-10 flex flex-col items-center justify-center gap-1.5 transition-all outline-none">
                <span class="w-6 h-0.5 bg-current transition-all duration-300" :class="{'rotate-45 translate-y-2': mobileMenuOpen, 'text-gray-900': (scrolled || !isHome || mobileMenuOpen), 'text-white': (!scrolled && isHome && !mobileMenuOpen)}"></span>
                <span class="w-6 h-0.5 bg-current transition-all duration-300" :class="{'opacity-0 -translate-x-2': mobileMenuOpen, 'text-gray-900': (scrolled || !isHome || mobileMenuOpen), 'text-white': (!scrolled && isHome && !mobileMenuOpen)}"></span>
                <span class="w-6 h-0.5 bg-current transition-all duration-300" :class="{'-rotate-45 -translate-y-2': mobileMenuOpen, 'text-gray-900': (scrolled || !isHome || mobileMenuOpen), 'text-white': (!scrolled && isHome && !mobileMenuOpen)}"></span>
            </button>
        </div>
    </div>

    <div 
        x-show="mobileMenuOpen" 
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-[-20px]"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-[-20px]"
        class="absolute top-full left-0 right-0 bg-white border-t border-gray-100 shadow-2xl lg:hidden max-h-screen overflow-y-auto"
        @click.away="mobileMenuOpen = false"
    >
        <div class="p-6 space-y-2">
            @foreach($links as $name => $route)
                <a href="{{ route($route) }}" class="block text-lg font-bold text-gray-900 hover:text-blue-600 transition-colors py-3 px-4 rounded-xl hover:bg-blue-50">
                    {{ $name }}
                </a>
            @endforeach
            <div class="pt-4 px-4 pb-6">
                <a href="{{ $whatsappLink }}" class="block w-full bg-blue-600 text-white text-center py-4 rounded-2xl font-extrabold shadow-xl shadow-blue-500/30">
                    Tanya via WhatsApp
                </a>
            </div>
        </div>
    </div>
</nav>
